<?php 

namespace App\Supports\Database;

use App\Models\{
	User, Role, Permission
}



trait HasPermission{

	/**
	 * @param $permision[]
	 */
	public function getAllPermission($permission)
	{
		return Permission::whereIn('slug', $permission)->get();
	}

	/**
	 * @param $permision object
	 * @return void
	 * */
	public function hasPermission($permission)
	{
		return (bool) $this->permissions->where('slug', $permission->slug)->count();
	}


	public function hasRols(...$roles)
	{
		foreach($roles as $role){
			if ($this->roles->contains('slug', $role->slug)) {
				return true;
			}
			return false;
		}
	}

	public function hasPermissionThroughRole(...$permissions)
	{
		foreach ($permissions->roles as $role) {
			if ($this->roles->contains($role)) {
				return true;
			}
			return false;
		}
	}



	/*Check the permission and return */
	public function hasPermissionTo($permission)
	{
		return $this->hasPermissionThroughRole($permission) || $this->hasPermission($permission)
	}


	/**
	 * Assing Permission to user 
	 * 
	 */
	public function setPermission(...$permissions)
	{
		$permissions = $this->getAllPermission($permissions);
		if ($permissions == null) {
			return $this;
		}
		$this->permissions()->saveMany($permissions);
		return $this;
	}


	/*
	* Permissions relation with user
	*/
	public function permissions()
	{
		$this->belongsToMany(Permission::class);
	}

	/*
	* Roles relation with user
	*/
	public function roles()
	{
		$this->belongsToMany(Role::class);
	}
}