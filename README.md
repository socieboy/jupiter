# Jupiter CMS

## Introduction

First, install the Jupiter installer and make sure that the global Composer bin directory is within your system's $PATH:
```
composer global require "socieboy/jupiter-installer=~1.0"
```

## Installation

Next, create a new Laravel application.
```
laravel new application
cd application
```

Before install the Jupiter CMS, you should configure the settings of your database on the .env file.
```
DB_DATABASE=your_database
DB_USERNAME=homestead
DB_PASSWORD=secret
```

Next run the command
```
jupiter install
```

During the proccess of the installation you will be asked if you want to install the migrations, if you set the database settings, type YES and continue.

Next, you will be asked to install, NPM, Bower and run Gulp, we recommend to type YES.


## Jupiter CMS Default values

### Users

You can change those values on the database\seeds\UserTableSeeder class of the system.

- Super Administrador - This user won't be displayed on the system. (I recommen to keep this user for the developer.)
  - Email: suadmin@suadmin.com
  - Password: suadmin

- Administrator
  - Email: admin@admin.com
  - Password: admin
 
### Roles

- super_admin
  - This role is assigned to the Super Admin and it won't be displayed on the roles table of the system.
- manage_roles
  - This role is assigned to the Administrator user to manage the CRUD of Roles and Permission.
- manage_users
  - This role is assigned to the Administrator user to manage the CRUD of Users.


### Permissions

- read_permissions
- create_permissions
- update_permissions
- delete_permissions

  - Those permisison are assigned to the super_admin .
  
- read_roles
- create_roles
- update_roles
- delete_roles

  - Those permission are assigned to the role manage_roles and super_admin.

- read_users
- create_users
- update_users
- delete_users

  - Those permission are assigned to the role manage_users and super_admin.

If you want to create your own permissions there is a PermissionTableSeeder class on the database\seeds\ folder.

Define a permission to upload a photo.
```
 Permission::create([
    'name' => 'upload_photo',
    'label' => 'Can upload photos'
  ]);
```

### Extend your application and use the ACL.

On your controller you can do that:
```
public function store(UploadPhotoRequest $request)
{
  $this->authorize('upload_photo');
  (new UploadPhoto($request->file('photo')));
}
```

On the views you can use the blade directives
```
@can('upload_photo')
  <a href="/photos/create">Upload photo</a>
@endcan
```

