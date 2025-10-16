<?php

namespace App\Http\Controllers;

use DataTables;
use App\Models\Role;
use App\Models\User;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $data = User::with('roles')
                ->where('id', '!=', 1)
                ->where('id', '!=', auth()->user()->id)
                ->whereDoesntHave('roles', function ($q) {
                    $q->where('name', 'customer');
                });

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('role', function ($row) {
                    if ($row->roles->isNotEmpty()) {
                        $badges = '';
                        foreach ($row->roles as $role) {
                            $badges .= '<span class="badge bg-label-primary me-1">' . $role->name . '</span>';
                        }
                        return $badges;
                    }
                    return '<span class="badge bg-secondary">No Role</span>';
                })
                ->addColumn('action', function ($row) {

                    $editUrl = route('users.edit', $row->id);
                    $deleteUrl = route('users.destroy', $row->id); // isko AJAX se handle karna hoga

                    $btn = '
                        <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                id="actionDropdown' . $row->id . '" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="actionDropdown' . $row->id . '">
                                <a class="dropdown-item" href="' . $editUrl . '">
                                    <i class="bx bx-edit-alt me-1"></i> Edit
                                </a>
                                <a class="dropdown-item delete-user" href="javascript:void(0);" data-url="' . $deleteUrl . '" data-id="' . $row->id . '">
                                    <i class="bx bx-trash me-1"></i> Delete
                                </a>
                            </div>
                        </div>';

                    return $btn;
                })
                ->rawColumns(['action', 'role'])
                ->make(true);
        }

        return view('content.users.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::where('id', '!=', 1)->get();
        $companies = Company::where('type', 'Company')->get();
        return view('content.users.create', compact('roles', 'companies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'full_name' => 'required|string|max:100',
                'password'  => 'required|string|min:8',
                'role_id'   => 'required|numeric|exists:roles,id',
                'status'    => 'nullable',
                'email'     => 'required|email|unique:users,email',
                'company'   => 'required|array|min:1',
                // 'company.*' => 'numeric|exists:companies,id'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'errors' => $validator->errors()
                ], 422);
            }

            // status convert to 1/0
            $status = isset($request->status) && $request->status === 'on' ? 1 : 0;

            $user = User::create([
                'name'     => $request->full_name,
                'email'    => $request->email,
                'password' => bcrypt($request->password),
                'role_id'  => $request->role_id,
                'status'   => $status,
            ]);

            // ✅ assign role using Spatie
            $role = Role::find($request->role_id);
            if ($role) {
                $user->assignRole($role->name);
            }

            // ✅ assign company
            if ($request->has('company')) {
                $user->companies()->sync($request->company);
            }

            return response()->json([
                'status'  => true,
                'message' => 'User created successfully',
                'redirect_url' => route('users.index'),
                'data'    => $user
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'status'  => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::with('companies', 'roles')->findOrFail($id);
        $roles = Role::where('id', '!=', 1)->get();
        $companies = Company::where('type', 'Company')->get(); // assuming companies table hai

        return view('content.users.edit', compact('user', 'roles', 'companies'));
    }

    /**
     * Update the specified resource in storage.
     */
    // Update method
    public function update(Request $request, $id)
    {
        try {
            $validator = Validator::make($request->all(), [
                'full_name' => 'required|string|max:100',
                'password'  => 'nullable|string|min:8',
                'role_id'   => 'required|numeric|exists:roles,id',
                'status'    => 'nullable',
                'email'     => 'required|email|unique:users,email,' . $id, // ignore current user
                'company'   => 'required|array|min:1',
                // 'company.*' => 'numeric|exists:companies,id'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'errors' => $validator->errors()
                ], 422);
            }

            $user = User::findOrFail($id);

            // status convert to 1/0
            $status = isset($request->status) && $request->status === 'on' ? 1 : 0;

            $user->name     = $request->full_name;
            $user->email    = $request->email;
            $user->status   = $status;

            if (!empty($request->password)) {
                $user->password = bcrypt($request->password);
            }

            $user->save();

            // ✅ update role using Spatie
            $role = Role::find($request->role_id);
            if ($role) {
                $user->syncRoles([$role->name]);
            }

            // ✅ update companies
            if ($request->has('company')) {
                $user->companies()->sync($request->company);
            }

            return response()->json([
                'status'  => true,
                'message' => 'User updated successfully',
                'redirect_url' => route('users.index'),
                'data'    => $user
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status'  => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return response()->json([
                'errors' => [
                    'current_password' => ['Current password is incorrect.']
                ]
            ], 422);
        }

        $user->update([
            'password' => bcrypt($request->password), // bcrypt instead of Hash::make
        ]);

        // Logout current user
        Auth::logout();

        return response()->json([
            'status' => true,
            'message' => 'Password updated successfully! Please login again.',
        ]);
    }
}
