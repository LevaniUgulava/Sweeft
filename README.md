## Spatie Role and Permissions

This application uses **Spatie's Laravel Permission** package for managing roles and permissions. After running the seeders, the following default user accounts will be available for login:

### 1) Administrator Account

-   **Email**: `administrator@example.com`
-   **Password**: `password123`
-   **Role**: `administrator`

The **administrator** has full access to all routes and can manage users, posts, books, and other content. The administrator has the highest level of access and permissions in the system.

### 2) Regular User Account

-   **Email**: `user@example.com`
-   **Password**: `password123`
-   **Role**: `user`

The **regular user** has limited access. Regular users can view and interact with content but cannot perform administrative actions such as creating, editing, or deleting posts or users.

---

## Seeder Commands

You can run the following commands to populate the database with roles, users, and permissions.

### 1) Run the `RolesSeeder`:

This will create default roles (e.g., `administrator`, `user`):

```bash
php artisan db:seed --class=RolesSeeder
```
