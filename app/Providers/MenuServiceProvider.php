<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\ServiceProvider;

class MenuServiceProvider extends ServiceProvider
{
  /**
   * Register services.
   */
  public function register(): void
  {
    //
  }

  /**
   * Bootstrap services.
   */
  public function boot(): void
  {
      // Load and decode JSON files
      $verticalMenuJson = file_get_contents(base_path('resources/menu/verticalMenu.json'));
      $verticalMenuData = json_decode($verticalMenuJson);
  
      $horizontalMenuJson = file_get_contents(base_path('resources/menu/horizontalMenu.json'));
      $horizontalMenuData = json_decode($horizontalMenuJson);
  
      $verticalMemberMenuJson = file_get_contents(base_path('resources/menu/verticalMemberMenu.json'));
      $verticalMemberMenuData = json_decode($verticalMemberMenuJson);
  
      // Separate menu data for admin and member roles
      $menuDataAdmin = [$verticalMenuData]; // Admin includes all
      $menuDataMember = [$verticalMemberMenuData,]; // Member includes only these
  
      // Check the user's role and set the appropriate menu data
      $menuData = Auth()->user() ? Auth::user()->role_id === 1 ? $menuDataAdmin : $menuDataMember : $menuDataMember;

  
      // Share the menuData with views
      $this->app->make('view')->share('menuData', $menuData);
  }
  
}
