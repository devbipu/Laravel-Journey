<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Role>
 */
class RoleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $roles = ['Admin', 'Editor', 'Author', 'Visitor'];

        $name = array_shift($roles);
        $slug = Str::slug($name);
        if (\App\Models\Role::where('slug', $slug)->count() == 0) {
            $slug = Str::slug($name);
        }else{
            $slug = Str::slug( $name.'-'. 1 );
        }
        
        
        return [
            'name'  => $name,
            'slug'  => $slug,
        ];
    }
}
