# WPSeed Naming Conventions

> This document is the single source of truth for naming patterns across WPSeed
> and every plugin cloned from it. AI assistants use this to predict file paths
> and class names without guessing. Developers use it to stay consistent.
>
> When cloning WPSeed, replace every occurrence of the boilerplate prefix with
> your plugin's own prefix throughout all files and in `composer.json`.

---

## Boilerplate Prefixes (replace when cloning)

| Type | WPSeed prefix | Example after cloning to EvolveWP.Verifier |
|---|---|---|
| PHP constants | `EVOLVEWP_ERP_` | `EVOLVEWP_VERIFIER_` |
| PHP functions | `evolvewp_erp_` | `evolvewp_verifier_` |
| Global classes | `EvolveWP_ERP_` | `EvolveWP_Verifier_` |
| Namespace root | `WPSeed\` | `EvolveWP\Verifier\` |
| Text domain | `wpseed` | `evolvewp-verifier` |
| Option prefix | `evolvewp_erp_` | `evolvewp_verifier_` |
| Hook prefix | `evolvewp_erp_` | `evolvewp_verifier_` |

---

## File Naming

| Type | Convention | Example |
|---|---|---|
| Legacy global classes | `kebab-case.php` | `includes/classes/install.php` |
| Namespaced classes | `PascalCase.php` matching the class name | `includes/Core/Install.php` |
| Templates | `admin-page-{tab-name}.php` | `templates/admin-page-settings.php` |
| Partials | `partial-{name}.php` | `templates/partials/partial-notice.php` |
| Functions files | `kebab-case.php` | `includes/functions/validate.php` |
| Assets (CSS/JS) | `kebab-case.css` / `kebab-case.js` | `assets/css/admin.css` |

---

## Class Naming

| Type | Convention | Example |
|---|---|---|
| Legacy global class | `EvolveWP_ERP_Category_Name` | `EvolveWP_ERP_Admin_Settings` |
| Namespaced class | `PascalCase` (no prefix — namespace provides context) | `WPSeed\Core\Install` → class `Install` |
| Abstract class | `Abstract_Name` or just the name with docblock noting it is abstract | `WPSeed\API\REST_Controller` |
| Interface | `Name_Interface` | `WPSeed\Core\Logger_Interface` |
| Trait | `Name_Trait` | `WPSeed\Core\Singleton_Trait` |

---

## Namespace Directory Map

The PSR-4 root `WPSeed\` maps to `includes/`. Subdirectory = sub-namespace.

```
WPSeed\Core\       → includes/Core/        Core classes loaded on every request
WPSeed\Admin\      → includes/Admin/       Admin-only classes
WPSeed\Ecosystem\  → includes/Ecosystem/   Cross-plugin registry and bridges
WPSeed\Utilities\  → includes/Utilities/   Stateless helper classes
WPSeed\API\        → includes/API/         REST controllers and API base classes
WPSeed\CLI\        → includes/CLI/         WP-CLI command classes
```

**File path from fully-qualified class name:**
`WPSeed\Core\Install` → `includes/Core/Install.php`
`WPSeed\Ecosystem\Registry` → `includes/Ecosystem/Registry.php`

**When cloning:** replace `EvolveWP\Core\\` with your namespace in both PHP files and
in the `composer.json` autoload section.

---

## Method Naming

| Convention | Example |
|---|---|
| `snake_case` for all methods | `get_plugin_count()` |
| Getters: `get_{noun}` | `get_registered_plugins()` |
| Setters: `set_{noun}` | `set_menu_location()` |
| Boolean checks: `is_{state}` or `has_{thing}` | `is_ecosystem_mode()`, `has_logging()` |
| Actions: `{verb}_{noun}` | `register_plugin()`, `detect_ecosystem()` |
| Static factories: `instance()` for singletons | `Registry::instance()` |

---

## Constant Naming

```
EVOLVEWP_ERP_VERSION          Plugin version string
EVOLVEWP_ERP_PLUGIN_FILE      Absolute path to main plugin file (__FILE__)
EVOLVEWP_ERP_PLUGIN_DIR_PATH  Absolute path to plugin root directory (trailing slash)
EVOLVEWP_ERP_PLUGIN_URL       Plugin root URL (trailing slash)
EVOLVEWP_ERP_LOG_DIR          Absolute path to log directory
EVOLVEWP_ERP_DEV_MODE         Boolean — true enables developer tooling
```

All constants guarded with `if ( ! defined( 'EVOLVEWP_ERP_CONSTANT_NAME' ) )`.

---

## Hook Naming

```
Pattern:   {prefix}_{noun}_{verb}
Examples:  evolvewp_erp_plugin_registered
           evolvewp_erp_ecosystem_loaded
           evolvewp_erp_settings_saved

Filter:    {prefix}_{noun}           (returns a value)
Examples:  evolvewp_erp_menu_location
           evolvewp_erp_registered_plugins

AJAX:      {prefix}_{action}
Examples:  evolvewp_erp_save_settings
           evolvewp_erp_get_status
```

---

## Option Naming

```
Pattern:   {prefix}_{setting_name}
Examples:  evolvewp_erp_version
           evolvewp_erp_db_version
           evolvewp_erp_ecosystem_mode
           evolvewp_erp_ecosystem_plugins
```

---

## Nonce Actions

```
Pattern:   {prefix}_{action_description}
Examples:  evolvewp_erp_save_settings
           evolvewp_erp_do_update
           evolvewp_erp_force_update
```

---

## Database Table Naming

```
Pattern:   {wpdb->prefix}{plugin_prefix}_{table_name}
Examples:  wp_evolvewp_erp_api_calls
           wp_evolvewp_erp_debug_logs
           wp_evolvewp_erp_notifications
```

---

## CSS / JS Handle Naming

```
Pattern:   {plugin-slug}-{asset-name}
Examples:  evolvewp-predictiveerp-admin
           evolvewp-predictiveerp-roadmap
           evolvewp-predictiveerp-ecosystem
```
