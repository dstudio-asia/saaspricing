# Research: Separate Widget Controls

## Decision 1: Keep each widget file as the entry point

- **Decision**: Keep each widget PHP file as the owning widget entry point for this phase,
  but allow that file to live inside a widget-owned folder.
- **Rationale**: The request is limited to control separation. Keeping the widget files in
  place reduces regression risk and avoids expanding the change into a full widget-logic
  migration.
- **Alternatives considered**:
  - Move each widget class into a new widget folder entry file: rejected because it expands
    the scope beyond control separation.
  - Split both widget logic and controls at once: rejected because it is harder to verify and
    not requested for this phase.

## Decision 2: Use per-widget folders under `includes/widgets/`

- **Decision**: Create one widget-owned folder per widget beneath `includes/widgets/`, and
  keep control traits inside that widget's own `controls/` subtree.
- **Rationale**: This gives each widget a clear self-contained control area without
  disturbing the existing widget registration flow.
- **Alternatives considered**:
  - Keep controls inline and split only helper methods: rejected because the main navigation
    problem remains.
  - Introduce a deeper folder tree beneath each widget control area: rejected because it adds
    indirection without enough benefit.

## Decision 3: Split content and style controls for every widget

- **Decision**: Every widget will have a separate content control manager file and style
  control manager file, even when a tab contains only one section.
- **Rationale**: A consistent workflow is easier for junior maintainers to follow and removes
  conditional rules about when a tab is or is not split.
- **Alternatives considered**:
  - Keep single-section tabs inline and split only multi-section tabs: rejected because the
    workflow changes between widgets and increases decision overhead.
  - Merge content and style into one controls file for simpler widgets: rejected because it
    weakens the tab-based navigation rule requested in the spec.

## Decision 4: Split multi-section tabs into tab-prefixed section files

- **Decision**: When a content tab or style tab contains multiple control sections, each
  section gets its own file with a `content-` or `style-` prefix.
- **Rationale**: The prefix makes file intent obvious during navigation, and section-level
  files keep large `register_controls()` implementations reviewable without obscuring the tab
  they belong to.
- **Alternatives considered**:
  - Keep one tab file with all tab sections inside it: rejected because the larger widgets
    would still produce oversized control files.
  - Use section names without tab prefixes: rejected because identical section labels can
    exist in different tabs and would be harder to distinguish.

## Decision 5: Compose controls through widget-owned traits

- **Decision**: Keep widget-specific control definitions inside each widget-owned `controls/`
  directory, with section traits composed by content/style manager traits and used directly
  by the widget class.
- **Rationale**: The feature goal is easier navigation, not maximum deduplication. Shared
  control abstractions would hide widget ownership and make the entry path less obvious.
- **Alternatives considered**:
  - Extract repeated control builders into shared files: rejected because it conflicts with
    the chosen workflow and increases indirection.
  - Move repeated rendering helpers into shared widget modules: rejected because widget logic
    is not part of this phase.

## Decision 6: Load widget control traits from `classes/widgets-manager.php`

- **Decision**: Load the widget control trait files from `classes/widgets-manager.php`
  before requiring the widget class files.
- **Rationale**: This matches the example widget connection pattern more closely: widget
  classes use traits directly, but do not `require_once` their trait files individually, and
  widget registration responsibilities move out of `includes/widget.php`.
- **Alternatives considered**:
  - `require_once` trait files inside each widget class file: rejected because it makes each
    widget class responsible for bootstrap-level loading.
  - Keep raw include snippets instead of trait methods: rejected because it does not match the
    reusable widget pattern used in the example structure.

## Decision 7: Keep imports local to the file that uses them

- **Decision**: Retain only direct-use Elementor imports in each widget file, and import
  Elementor classes separately inside each trait file that references them.
- **Rationale**: PHP `use` imports are file-scoped. Localizing imports avoids stale imports in
  widget files and prevents missing-class errors in extracted trait files.
- **Alternatives considered**:
  - Keep all original widget-file imports after extraction: rejected because many become
    unused and misrepresent ownership.
  - Assume trait files inherit imports from the widget file: rejected because PHP does not
    apply imports across files.

## Decision 8: Preserve plugin runtime contracts exactly

- **Decision**: Keep `saaspricing.php`, `includes/widget.php`, `classes/widgets-manager.php`,
  widget class names, widget registration order, asset handles, editor/frontend behavior, and
  compatibility behavior unchanged while moving only internal control composition and file
  organization.
- **Rationale**: The constitution requires structure changes without feature loss, and this
  plugin depends on stable Elementor registration and asset loading.
- **Alternatives considered**:
  - Rename classes or widget identifiers during the refactor: rejected because it risks
    breaking existing usage and expands scope beyond structural cleanup.
  - Reorganize frontend assets in the same change: rejected because this feature is about PHP
    control structure and ownership.
