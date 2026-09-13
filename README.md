<div align="center">

# Book Management CRUD

**A session-backed PHP application for managing books and user accounts.**

`PHP` · `MySQL` · `PDO` · `Server-rendered HTML`

</div>

The application covers a complete introductory CRUD workflow: authenticated users can create, browse, update, and delete book records, while a separate administration flow manages application users.

## Features

- Account registration and sign-in with hashed passwords
- PHP session handling and authenticated page guards
- Book creation, listing, editing, and deletion
- User listing, editing, and deletion
- PDO-based MySQL access with prepared statements
- Shared headers, footers, and responsive styling

## Run locally

1. Start Apache and MySQL using XAMPP, WAMP, MAMP, or an equivalent stack.
2. Create the application database with the SQL files in `project-root/sql/`.
3. Review the database values in `project-root/config/config.php`.
4. Serve `project-root/public/` as the web root.
5. Open the local URL exposed by your web server.

For PHP's built-in server:

```bash
php -S localhost:8000 -t project-root/public
```

## Structure

```text
project-root/
├── config/      Database configuration
├── includes/    Connection and shared layout
├── public/      Authentication, book, and user routes
└── sql/         Database schema and seed material
```

## Security scope

This is a learning project, not a production-ready administration system. Before public deployment, move credentials into environment variables, add CSRF protection, restrict user-management routes by role, and review session/cookie settings.

## License

No license is currently declared. All rights are reserved by default.
