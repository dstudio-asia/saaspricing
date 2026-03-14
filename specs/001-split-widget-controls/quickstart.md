# Quickstart: Separate Widget Controls

## Prerequisites

- WordPress with the `saaspricing` plugin available in the local development environment
- Elementor installed and activated
- Access to wp-admin and the Elementor editor

## Validation Steps

1. Activate the plugin and confirm no admin compatibility notice appears unexpectedly.
2. Open Elementor and verify the `SaasPricing` category is still available.
3. Insert each existing widget once:
   - Comparison Table
   - Horizontal Pricing Table
   - Pricelist
   - Vertical Pricing Table
4. For each widget, verify:
   - The widget appears in the panel and can be added without errors.
   - The content tab loads all existing control areas.
   - The style tab loads all existing control areas.
   - Controls with multiple sections still appear in their original order and remain editable.
   - Controls from single-section tabs still appear and behave correctly after being moved
     into their own tab files.
5. Save and preview the page, then confirm the rendered output matches the pre-refactor
   behavior for each widget.
6. Confirm frontend assets still load for the affected widgets:
   - Common plugin CSS
   - Common plugin JS
   - Widget-specific behavior already present in the plugin
7. Repeat a quick edit/save cycle for at least one widget with the most control sections
   to confirm no editor regression was introduced.

## Widget Entry Review

1. Open `includes/widget.php` and confirm it still acts as the single orchestration file.
2. Open `classes/widgets-manager.php` and confirm it loads widget control trait files before widget
   class files are registered.
3. Confirm the same widget classes remain in use:
   - `includes/widgets/comparison-table/saaspricing-comparison-table.php`
   - `includes/widgets/horizontal-table/saaspricing-horizontal-table.php`
   - `includes/widgets/pricelist/saaspricing-pricelist.php`
   - `includes/widgets/vertical-table/saaspricing-vertical-table.php`
4. Confirm each widget file still owns its widget class after the control split.
5. Confirm `classes/widgets-manager.php` loads the widget control trait files before the widget
   classes are required.

## Control Layout Review

For each widget-owned control directory under `includes/widgets/`:

1. Confirm `controls/content-controls-manager.php` exists.
2. Confirm `controls/style-controls-manager.php` exists.
3. If the content tab has multiple sections, confirm each section has its own
   `controls/content-controls/content-<section>.php` file.
4. If the style tab has multiple sections, confirm each section has its own
   `controls/style-controls/style-<section>.php` file.
5. Confirm section file names make similar-looking sections distinguishable without requiring
   another widget's files for context.
6. Confirm the control manager files are trait aggregators, and the section files are traits
   with widget-owned methods.
7. Confirm the widget file keeps only its direct-use Elementor imports, and each trait file
   imports the Elementor classes it uses itself.

## Navigation Review

1. Starting from `includes/widget.php`, trace the registration flow into
   `classes/widgets-manager.php`, then to the control files, and then to the widget class.
2. Confirm the navigation path never requires unrelated widget files.
3. Confirm the structure stays shallow:
   - the widget-owned folder
   - the widget file
   - `controls/content-controls-manager.php`
   - `controls/style-controls-manager.php`
   - only the tab-prefixed section files needed for that widget

## Mapping Review

Document a before/after mapping for:

- Every moved content-tab control area
- Every moved style-tab control area
- Each widget individually: comparison, horizontal, pricelist, and vertical

## Current Mapping Baseline

- Comparison widget entry file remains `includes/widgets/comparison-table/saaspricing-comparison-table.php`
  and now loads:
  - `includes/widgets/comparison-table/controls/content-controls-manager.php`
  - `includes/widgets/comparison-table/controls/style-controls-manager.php`
- Comparison widget traits are loaded from `classes/widgets-manager.php` before
  `includes/widgets/comparison-table/saaspricing-comparison-table.php` is required.
- Comparison content-tab sections currently map as:
  - inline `Table` controls -> `includes/widgets/comparison-table/controls/content-controls/content-table.php`
  - inline `Columns` controls -> `includes/widgets/comparison-table/controls/content-controls/content-columns.php`
  - inline `Features` controls -> `includes/widgets/comparison-table/controls/content-controls/content-features.php`
  - inline `Buttons` controls -> `includes/widgets/comparison-table/controls/content-controls/content-buttons.php`
- Comparison style-tab sections currently map as:
  - inline `Table` controls -> `includes/widgets/comparison-table/controls/style-controls/style-table.php`
  - inline `Columns` controls -> `includes/widgets/comparison-table/controls/style-controls/style-columns.php`
  - inline `Pricing` controls -> `includes/widgets/comparison-table/controls/style-controls/style-pricing.php`
  - inline `Tooltip` controls -> `includes/widgets/comparison-table/controls/style-controls/style-tooltip.php`
  - inline `Features` controls -> `includes/widgets/comparison-table/controls/style-controls/style-features.php`
  - inline `Review` controls -> `includes/widgets/comparison-table/controls/style-controls/style-review.php`
  - inline `Ribbon` controls -> `includes/widgets/comparison-table/controls/style-controls/style-ribbon.php`
  - inline `Buttons` controls -> `includes/widgets/comparison-table/controls/style-controls/style-buttons.php`
- Remaining widgets should follow the same widget-owned folder pattern as they are split.
- Horizontal widget entry file now lives at `includes/widgets/horizontal-table/saaspricing-horizontal-table.php`
  and now loads:
  - `includes/widgets/horizontal-table/controls/content-controls-manager.php`
  - `includes/widgets/horizontal-table/controls/style-controls-manager.php`
- Horizontal content-tab sections currently map as:
  - inline `Header` controls -> `includes/widgets/horizontal-table/controls/content-controls/content-header.php`
  - inline `Features` controls -> `includes/widgets/horizontal-table/controls/content-controls/content-features.php`
  - inline `Pricing` controls -> `includes/widgets/horizontal-table/controls/content-controls/content-pricing.php`
  - inline `Buttons` controls -> `includes/widgets/horizontal-table/controls/content-controls/content-buttons.php`
- Horizontal style-tab sections currently map as:
  - inline `Header` controls -> `includes/widgets/horizontal-table/controls/style-controls/style-header.php`
  - inline `Divider` controls -> `includes/widgets/horizontal-table/controls/style-controls/style-divider.php`
  - inline `Features` controls -> `includes/widgets/horizontal-table/controls/style-controls/style-features.php`
  - inline `CTA` controls -> `includes/widgets/horizontal-table/controls/style-controls/style-cta.php`
  - inline `Ribbon` controls -> `includes/widgets/horizontal-table/controls/style-controls/style-ribbon.php`
  - inline `Pricing` controls -> `includes/widgets/horizontal-table/controls/style-controls/style-pricing.php`
  - inline `Countdown` controls -> `includes/widgets/horizontal-table/controls/style-controls/style-countdown.php`
  - inline `Review` controls -> `includes/widgets/horizontal-table/controls/style-controls/style-review.php`
  - inline `Buttons` controls -> `includes/widgets/horizontal-table/controls/style-controls/style-buttons.php`
- Pricelist widget entry file now lives at `includes/widgets/pricelist/saaspricing-pricelist.php`
  and now loads:
  - `includes/widgets/pricelist/controls/content-controls-manager.php`
  - `includes/widgets/pricelist/controls/style-controls-manager.php`
- Pricelist content-tab sections currently map as:
  - inline `Price List` controls -> `includes/widgets/pricelist/controls/content-controls/content-pricelist.php`
- Pricelist style-tab sections currently map as:
  - inline `Price List` controls -> `includes/widgets/pricelist/controls/style-controls/style-pricelist.php`
- Vertical widget entry file now lives at `includes/widgets/vertical-table/saaspricing-vertical-table.php`
  and now loads:
  - `includes/widgets/vertical-table/controls/content-controls-manager.php`
  - `includes/widgets/vertical-table/controls/style-controls-manager.php`
- Vertical content-tab sections currently map as:
  - inline `Header` controls -> `includes/widgets/vertical-table/controls/content-controls/content-header.php`
  - inline `Body` controls -> `includes/widgets/vertical-table/controls/content-controls/content-body.php`
  - inline `Features` controls -> `includes/widgets/vertical-table/controls/content-controls/content-features.php`
  - inline `Buttons` controls -> `includes/widgets/vertical-table/controls/content-controls/content-buttons.php`
- Vertical style-tab sections currently map as:
  - inline `Header` controls -> `includes/widgets/vertical-table/controls/style-controls/style-header.php`
  - inline `Ribbon` controls -> `includes/widgets/vertical-table/controls/style-controls/style-ribbon.php`
  - inline `Pricing` controls -> `includes/widgets/vertical-table/controls/style-controls/style-pricing.php`
  - inline `Countdown` controls -> `includes/widgets/vertical-table/controls/style-controls/style-countdown.php`
  - inline `Review` controls -> `includes/widgets/vertical-table/controls/style-controls/style-review.php`
  - inline `Features` controls -> `includes/widgets/vertical-table/controls/style-controls/style-features.php`
  - inline `Buttons` controls -> `includes/widgets/vertical-table/controls/style-controls/style-buttons.php`

## Completion Evidence

- A before/after mapping exists for all moved control areas.
- `includes/widget.php` still delegates widget registration successfully.
- `classes/widgets-manager.php` resolves the widget control trait files before the widget files
  successfully.
- All four widgets pass the editor and frontend regression checks above.
