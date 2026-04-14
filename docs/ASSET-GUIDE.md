# Asset Guide

> How the CSS and JavaScript system works in WPSeed-based plugins.
> Covers the variable system, component naming, page-based loading,
> and what to keep or delete when cloning.

---

## Design Token System

All styling uses CSS custom properties defined in `assets/css/base/variables.css`.
Never hardcode colours, spacing, or typography values — use the tokens.

### Colour tokens

```css
/* Primary brand */
--evolvewp-predictiveerp-color-primary        /* #2271b1 — WordPress blue */
--evolvewp-predictiveerp-color-primary-dark
--evolvewp-predictiveerp-color-primary-light

/* Accent (secondary brand) */
--evolvewp-predictiveerp-color-accent
--evolvewp-predictiveerp-color-accent-dark
--evolvewp-predictiveerp-color-accent-light

/* Semantic */
--evolvewp-predictiveerp-color-success         /* Green */
--evolvewp-predictiveerp-color-warning         /* Amber */
--evolvewp-predictiveerp-color-error           /* Red */
--evolvewp-predictiveerp-color-info            /* Blue */

/* Neutral scale */
--evolvewp-predictiveerp-color-gray-50 through --evolvewp-predictiveerp-color-gray-900
--evolvewp-predictiveerp-color-white
--evolvewp-predictiveerp-color-black

/* Status backgrounds (for notice boxes) */
--evolvewp-predictiveerp-status-success-bg / -border / -text
--evolvewp-predictiveerp-status-warning-bg / -border / -text
--evolvewp-predictiveerp-status-error-bg   / -border / -text
--evolvewp-predictiveerp-status-info-bg    / -border / -text
```

### Spacing tokens

```css
--evolvewp-predictiveerp-spacing-xs    /* 4px */
--evolvewp-predictiveerp-spacing-sm    /* 8px */
--evolvewp-predictiveerp-spacing-md    /* 12px */
--evolvewp-predictiveerp-spacing-lg    /* 16px */
--evolvewp-predictiveerp-spacing-xl    /* 20px */
--evolvewp-predictiveerp-spacing-2xl   /* 24px */
--evolvewp-predictiveerp-spacing-3xl   /* 32px */
```

### Typography tokens

```css
--evolvewp-predictiveerp-font-family-base   /* System font stack */
--evolvewp-predictiveerp-font-family-mono   /* Consolas, Monaco, monospace */
--evolvewp-predictiveerp-font-size-xs through --evolvewp-predictiveerp-font-size-3xl
--evolvewp-predictiveerp-font-weight-normal / -medium / -semibold / -bold
--evolvewp-predictiveerp-line-height-tight / -normal / -relaxed
```

### Other tokens

```css
/* Borders */
--evolvewp-predictiveerp-border-radius / -sm / -md / -lg / -xl / -full
--evolvewp-predictiveerp-border-standard   /* 1px solid gray-300 */

/* Shadows */
--evolvewp-predictiveerp-shadow-sm / (default) / -md / -lg / -xl

/* Transitions */
--evolvewp-predictiveerp-transition-fast / -normal / -slow

/* Focus (accessibility) */
--evolvewp-predictiveerp-focus-ring          /* 2px solid primary */
--evolvewp-predictiveerp-focus-ring-offset   /* 1px */

/* Z-index scale */
--evolvewp-predictiveerp-z-index-dropdown / -modal / -popover / -tooltip / -toast
```

---

## Component CSS Naming Convention

All CSS classes use the `.evolvewp-predictiveerp-` prefix to avoid conflicts with themes
and other plugins. When cloned, the prefix changes to the plugin's own
(e.g. `.evolvewp-predictiveerp-`).

Pattern: `.evolvewp-predictiveerp-{component}-{element}--{modifier}`

```css
/* Component */
.evolvewp-predictiveerp-card { }

/* Element within component */
.evolvewp-predictiveerp-card-header { }
.evolvewp-predictiveerp-card-body { }
.evolvewp-predictiveerp-card-footer { }

/* Modifier */
.evolvewp-predictiveerp-card-interactive { }

/* State */
.evolvewp-predictiveerp-button:disabled { }
.evolvewp-predictiveerp-button-loading { }
```

---

## Directory Structure

```
assets/css/
  base/              ← Design tokens, reset, typography (loaded everywhere)
  components/        ← Reusable UI components (buttons, cards, tables, etc.)
  dark/              ← Dark mode overrides
  layouts/           ← Page structure, grids, tabs, responsive
  pages/             ← Page-specific styles (dashboard, settings, development)
  *.css              ← Standalone feature styles (root level)

assets/js/
  admin/             ← Admin-only scripts (roadmap, settings, setup)
  jquery-blockui/    ← jQuery BlockUI library
  select2/           ← Select2 library
  *.js               ← Standalone scripts (root level)
```

---

## Page-Based Loading

CSS files are NOT loaded globally. The `style-assets.php` registry defines
which pages each file loads on. The Asset Queue reads this and only enqueues
what's needed.

### How it works

1. `style-assets.php` returns an array of CSS files with `pages` arrays
2. `EvolveWP_ERP_Asset_Queue` detects the current admin page slug
3. Only files whose `pages` array includes the current page (or `'all'`) are enqueued

### Page values

| Value | When it loads |
|---|---|
| `'all'` | Every admin page |
| `'evolvewp_erp_development'` | Development page only |
| `'evolvewp_erp_settings'` | Settings page only |
| `'evolvewp_erp_dashboard'` | Dashboard page only |
| `'plugins'` | WordPress Plugins screen |
| Custom slug | Your plugin's own page slugs |

### Adding a new CSS file

1. Create the file in the appropriate directory
2. Add an entry to `style-assets.php` in the correct category
3. Set the `pages` array to control where it loads
4. Set `dependencies` if it requires `variables` (most do)

```php
'my-component' => array(
    'path'         => 'css/components/my-component.css',
    'purpose'      => 'My custom component',
    'pages'        => array( 'evolvewp_erp_development' ),
    'dependencies' => array( 'variables' ),
),
```

---

## Core Components

These are the components every plugin inherits. They use `--evolvewp-predictiveerp-*` variables
throughout and are responsive down to 782px (WordPress admin minimum).

| Component | File | What it provides |
|---|---|---|
| Buttons | `components/buttons.css` | Primary, secondary, success, danger, warning, link, icon, loading, groups |
| Cards | `components/cards.css` | Card, card-header, card-body, card-footer, metric cards, API cards |
| Tables | `components/tables.css` | Bordered, striped, hover, compact, responsive, sortable, pagination |
| Forms | `components/forms.css` | Inputs, textareas, selects, form rows, horizontal/inline layouts |
| Notices | `components/notices.css` | Success, warning, error, info notices with badges |
| Modals | `components/modals.css` | Modal dialogs |
| Tooltips | `components/tooltips.css` | Basic, rich, interactive, positional tooltips |
| Badges | `components/badges.css` | Status badges |
| Progress | `components/progress.css` | Progress bars and indicators |
| Accordion | `components/accordion.css` | Expand/collapse panels |
| Steps | `components/steps.css` | Step indicators |
| Switches | `components/switches.css` | Toggle switches |

---

## When Cloning to a New Plugin

After running the WPSeed cloning process:

1. All `.evolvewp-predictiveerp-` class prefixes become your plugin's prefix
2. All `--evolvewp-predictiveerp-` CSS variables become your plugin's prefix
3. The `style-assets.php` page slugs need updating to your plugin's page slugs
4. Delete any development-only files you don't need (charts, data-explorer, etc.)
5. Keep all base/ and core component files — they're the UI foundation

### Files safe to delete on clone

Development-only files that you may not need:

- `components/animations.css` — CSS animation showcase
- `components/charts.css` — chart visualisation
- `components/data-analysis.css` — data analysis components
- `components/data-explorer.css` — data explorer UI
- `components/data-filters.css` — data filter components
- `components/diagnostics.css` — diagnostic panels
- `components/log-viewer.css` — log viewer UI
- `components/working-notes.css` — working notes display
- `pages/ui-library.css` — UI library showcase

### Files to always keep

- Everything in `base/` — design tokens, reset, typography
- Everything in `layouts/` — page structure
- Core components listed in the table above
- `dark/` — dark mode support
