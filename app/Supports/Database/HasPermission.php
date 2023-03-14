<?php 

namespace App\Supports\Database;

use App\Models\{
	User, Role, Permission
};



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


	public function hasRole(...$roles)
	{
		foreach($roles as $role){
			if ($this->roles->contains('slug', $role)) {
				return true;
			}
			return false;
		}
	}


	/**
	 * Check the user permission  
	 * @return boolean 
	 */
	public function hasPermissionTo($permission)
	{
		return (bool) $this->hasPermissionThroughRole($permission) || $this->hasPermission($permission);
	}



	public function hasPermissionThroughRole($permissions)
	{
		// dd($permissions->roles);
		foreach ($permissions->roles as $role) {
			if ($this->roles->contains($role)) {
				return true;
			}
			return false;
		}
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
		return $this->belongsToMany(Permission::class);
	}

	/*
	* Roles relation with user
	*/
	public function roles()
	{
		return $this->belongsToMany(Role::class);
	}
}