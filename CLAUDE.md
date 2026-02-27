# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

ECSHOP is an open-source PHP e-commerce platform (version ^8.3). It's a traditional monolithic PHP application with a custom template engine, MySQL database, and plugin-based architecture for payments and shipping.

## Common Commands

```bash
# Install dependencies
composer install

# Run code style fixing (Pint)
./vendor/bin/pint

# Run static analysis (PHPStan)
./vendor/bin/phpstan analyse
```

## Architecture

### Directory Structure
- `/admin` - Backend administration panel (PHP + templates)
- `/includes` - Core libraries and classes
- `/themes/default` - Frontend templates (`.dwt` files)
- `/languages` - Internationalization files (zh_cn, etc.)
- `/js` - Frontend JavaScript
- `/api` - API endpoints
- `/install` - Installation wizard
- `/data` - Runtime data (config, uploads, caches)

### Core Concepts

**Template System**: Uses custom `cls_template` class (similar to Smarty). Templates are `.dwt` files in `themes/default/`. Variables are assigned via `$smarty->assign('key', $value)` and displayed with `{` and `}` delimiters (not Smarty's `{` and `}`).

**Database**: Custom `cls_mysql` class in `/includes/cls_mysql.php`. Tables are accessed via `$ecs->table('table_name')` method which adds the configured prefix.

**Routing**: Traditional PHP - each entry point is a separate PHP file in the root (`index.php`, `goods.php`, `flow.php`, `user.php`, etc.). No modern routing framework.

**Plugin System**: Payment and shipping modules are plugins in `/includes/modules/` directory.

**Authentication**: Session-based with cookie support. User data stored in `ecs_users` table.

### Key Files

- `/includes/init.php` - Frontend bootstrap (checks install lock, loads config, initializes DB, session, smarty)
- `/admin/includes/init.php` - Admin bootstrap
- `/includes/cls_template.php` - Custom template engine
- `/includes/cls_mysql.php` - Database wrapper
- `/includes/lib_*.php` - Core library functions (lib_main.php, lib_goods.php, lib_order.php, etc.)
- `/data/config.php` - Database configuration (created during installation)

### Constants

- `IN_ECS` - Defined in all ECSHOP pages to prevent direct access
- `ROOT_PATH` - Server root path
- `PHP_SELF` - Current script path
- `DEBUG_MODE` - Enables debug output

### Database Tables

Tables use `ecs_` prefix by default. Main tables: `ecs_users`, `ecs_goods`, `ecs_order_info`, `ecs_category`, `ecs_brand`, `ecs_cart`.

### Code Style

- Indent: 4 spaces
- Line endings: CRLF
- Charset: UTF-8
- Use `pint` to format code.
