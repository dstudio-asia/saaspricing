# Data Model: Separate Widget Controls

## Widget Entry File

- **Description**: The widget PHP file that remains the owning class file for one Elementor
  widget.
- **Fields**:
  - `file_path`: widget file path such as
    `includes/widgets/comparison-table/saaspricing-comparison-table.php`
  - `class_name`: existing Elementor widget class name that must remain compatible
  - `control_dir`: widget-owned `controls/` directory containing tab and section control
    traits
- **Validation Rules**:
  - `file_path` MUST remain present for this phase.
  - `class_name` MUST remain unchanged for compatibility.
  - `control_dir` MUST have an explicit old-to-new mapping for moved control areas.

## Control Tab Group

- **Description**: The set of control definitions belonging to one tab for one widget.
- **Fields**:
  - `widget_file`: owning widget entry file
  - `tab`: `content` or `style`
  - `file`: mandatory top-level aggregator trait such as
    `content-controls-manager.php` or `style-controls-manager.php`
  - `section_count`: number of control sections represented under the tab
- **Validation Rules**:
  - Every widget MUST have one `content` tab group and one `style` tab group.
  - The `file` MUST exist even when `section_count` is `1`.
  - `tab` names MUST stay aligned with Elementor tab usage.
  - The tab group trait remains the tab entry point even when extra section traits exist.

## Control Section File

- **Description**: A trait file representing one named control section within a tab.
- **Fields**:
  - `widget_file`: owning widget entry file
  - `tab`: `content` or `style`
  - `section_name`: human-readable section identifier
  - `file_name`: tab-prefixed section file such as `content-table.php`
  - `required`: whether the section exists for the widget
- **Validation Rules**:
  - `file_name` MUST start with the tab prefix.
  - A multi-section tab MUST create one file per section.
  - A single-section tab MAY omit extra section files but MUST still retain the top-level tab
    file.
  - Section names MUST be distinct within a widget tab.
  - Similar-looking section names MUST remain distinguishable enough for a maintainer to pick
    the correct file without opening unrelated section files in most review attempts.

## Bootstrap Registration Map

- **Description**: The mapping between orchestration code and the current widget entry files.
- **Fields**:
  - `orchestrator`: `includes/widget.php`
  - `widget_manager`: `classes/widgets-manager.php`
  - `widget_requires`: list of widget files required for registration
  - `registered_classes`: existing widget class instances registered with Elementor
- **Validation Rules**:
  - Registration order MUST remain functionally equivalent to the current plugin behavior.
  - Each required widget file MUST resolve to the same widget class currently exposed.
  - No existing widget may be dropped from the map.

## Relationships

- A **Widget Entry File** owns exactly two **Control Tab Groups**.
- A **Control Tab Group** may own zero or more **Control Section Files** in addition to its
  mandatory top-level tab file.
- The **Bootstrap Registration Map** references all **Widget Entry Files** through their
  current paths.

## Trait Loader Map

- **Description**: The mapping between bootstrap code, control trait files, and widget entry
  files.
- **Fields**:
  - `loader`: `classes/widgets-manager.php`
  - `trait_root`: widget-owned `controls/` directories under `includes/widgets/`
  - `aggregator_traits`: widget-level `content-controls-manager.php` and
    `style-controls-manager.php`
- **Validation Rules**:
  - Trait files MUST be loaded before the widget class file is required.
  - Aggregator traits MAY compose multiple section traits.
  - Widget classes use trait methods directly inside `register_controls()`.
  - Widget entry files keep only imports used directly by the widget file.
  - Trait files declare their own imports for Elementor classes used inside that trait.
