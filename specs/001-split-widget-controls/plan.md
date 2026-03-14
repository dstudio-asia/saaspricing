# Implementation Plan: Separate Widget Controls

**Branch**: `naimur/splitWidgetControls` | **Date**: 2026-03-14 | **Spec**: [spec.md](/C:/xampp/htdocs/marquee-addons/wp-content/plugins/saaspricing/specs/001-split-widget-controls/spec.md)  
**Input**: Feature specification from `/specs/001-split-widget-controls/spec.md`

## Summary

Refactor the four existing Elementor widgets so their control definitions move out of the
current single widget files into widget-owned folders. Each widget will own a directory
under `includes/widgets/<widget>/`, keep its widget PHP file there as the entry point, and
place its control traits inside a local `controls/` directory. Every widget will have
separate content and style control manager traits even when a tab has only one section, and
any tab with multiple sections will split those sections into additional tab-prefixed
section traits inside tab-specific folders. The reorganization must preserve the current
plugin bootstrap flow, widget registration, control availability, rendered output, and asset
behavior.

## Technical Context

**Language/Version**: PHP 7.4+  
**Primary Dependencies**: WordPress 5.8+, Elementor 3.5+, plugin-local `Sassp_Utils` trait  
**Storage**: N/A  
**Testing**: Manual regression validation in WordPress + Elementor editor/runtime flows  
**Target Platform**: WordPress plugin running in wp-admin and Elementor editor/frontend  
**Project Type**: WordPress Elementor plugin  
**Performance Goals**: No perceptible regression in widget registration or editor/frontend load behavior  
**Constraints**: Keep `saaspricing.php` as plugin entrypoint; preserve existing hooks, widget registration, asset handles, user-facing controls, and current widget entry files; no shared widget-control files across widgets; navigation must stay shallow and predictable  
**Scale/Scope**: 4 existing widgets, 4 existing widget PHP files, multiple control sections per widget, current assets remain under `assets/`

## Constitution Check

*GATE: Must pass before Phase 0 research. Re-check after Phase 1 design.*

- Pass: Modularization scope is limited to widget-owned control traits for the comparison,
  horizontal, pricelist, and vertical widgets.
- Pass: Preserved runtime contracts are identified: `saaspricing.php`, `includes/widget.php`,
  `classes/widgets-manager.php`, the four current widget files, Elementor widget
  registration, existing asset enqueues, current control sets, and current frontend output.
- Pass: Ownership boundaries are explicit after refactor: each widget keeps its own entry
  file inside a widget-owned folder and gains its own local `controls/` directory; widget
  control trait files are loaded from `classes/widgets-manager.php` before widget class
  registration; no widget-specific logic is moved into shared files.
- Pass: Asset isolation remains unchanged because this feature does not restructure
  `assets/css` or `assets/js`.
- Pass: Regression validation is defined in quickstart for plugin load, editor controls,
  and frontend rendering across all four widgets.

## Project Structure

### Documentation (this feature)

```text
specs/001-split-widget-controls/
|-- plan.md
|-- research.md
|-- data-model.md
|-- quickstart.md
|-- contracts/
|   |-- bootstrap-contract.md
|   `-- widget-module-contract.md
`-- tasks.md
```

### Source Code (repository root)

```text
saaspricing.php
classes/
`-- widgets-manager.php
includes/
|-- Utils.php
|-- widget.php
`-- widgets/
    |-- comparison-table/
    |   |-- saaspricing-comparison-table.php
    |   `-- controls/
    |       |-- content-controls-manager.php
    |       |-- style-controls-manager.php
    |       |-- content-controls/
    |       |   `-- content-*.php
    |       `-- style-controls/
    |           `-- style-*.php
    |-- saaspricing-horizontal-table.php
    |-- saaspricing-pricelist.php
    |-- saaspricing-vertical-table.php
assets/
|-- css/
`-- js/
languages/
readme.txt
```

**Structure Decision**: Use widget-owned folders under `includes/widgets/` instead of a
shared `traits/` tree. The comparison widget already follows this layout with
`includes/widgets/comparison-table/saaspricing-comparison-table.php` and local control
traits under `controls/`. Each widget gets `content-controls-manager.php` and
`style-controls-manager.php` as aggregator traits; tabs with multiple sections add
additional `content-*.php` or `style-*.php` section traits inside matching tab folders.
`includes/widget.php` delegates widget registration to `classes/widgets-manager.php`, which
loads a widget's control trait files first and then registers the widget class. Imports are
localized: widget files keep only the Elementor imports they use directly, and each trait
file owns its own Elementor imports.

## Complexity Tracking

No constitution violations or extra complexity exemptions are required for this feature.
