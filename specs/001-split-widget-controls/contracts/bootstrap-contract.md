# Bootstrap Contract

## Purpose

Define the runtime contract that the plugin bootstrap and widget orchestrator must preserve
while control files move out of the current widget files.

## Contract

- `saaspricing.php` remains the plugin entrypoint.
- `saasp_load_plugin_data()` continues to load `includes/Utils.php` and `includes/widget.php`.
- `includes/widget.php` remains the orchestration point that:
  - checks Elementor/PHP compatibility
  - registers/enqueues existing plugin styles and scripts
  - delegates widget registration to `classes/widgets-manager.php`
  - registers all four widgets with Elementor
- `classes/widgets-manager.php` loads widget control trait files before widget class files are
  required and registers the configured widgets.
- Widget registration continues to expose these classes:
  - `Saaspricing_Pricelist`
  - `Saasp_Horizontal`
  - `Saasp_Vertical`
  - `Saasp_Comparison`

## Compatibility Rules

- Existing widget names, titles, icons, categories, and keywords remain unchanged.
- Existing asset handles remain unchanged.
- Widget compatibility remains unchanged even as widget file paths are reorganized into
  widget-owned folders.
- Separating control files MUST NOT change public plugin behavior.
- Widget classes continue to register through the same four widget classes, but their control
  traits are preloaded from widget-owned `controls/` directories through
  `classes/widgets-manager.php`.
