# Feature Specification: Separate Widget Controls

**Feature Branch**: `001-split-widget-controls`  
**Created**: 2026-03-14  
**Status**: Draft  
**Input**: User description: "for this project i have 4 widget. which are in a single file. i need to make a seperation for each one of them. i will need the controls in seperate files. There is controls for content tab and style tab. and also for content and style tab we will have some section for the widgets, some have multiple and some dont have multiple sections for content tab and style tab. So if there is multiple section then we will make one file for each section also make prefixed with the tab to easily understand. the folder structure will be just the way it is nessesarry to understand and navigate easily. not too modular that the navigation becomes hard."

## Clarifications

### Session 2026-03-14

- Q: How should single-section tabs be organized? -> A: Split them into separate tab files too so every widget follows the same workflow.
- Q: What should be the top-level grouping for the reorganized files? -> A: Each widget should move into its own widget-owned folder under `includes/widgets/<widget>/`, keep its widget file there, and place content/style control files inside a local `controls/` folder.
- Q: Should reused widget logic move into shared files? -> A: No shared files; keep logic and control ownership tied to each widget.
- Q: Does this feature move core widget logic out of the current widget files? -> A: No. The current widget files remain the widget entry points for now; only control definitions are separated.
- Q: What does "not too modular" mean for review? -> A: Keep one widget-owned folder per widget, keep the widget file as the entry point, add one `controls/content-controls-manager.php` and one `controls/style-controls-manager.php`, and only add tab-prefixed section files under their matching tab folders when needed.
- Q: How are widget traits connected at runtime? -> A: `includes/widget.php` delegates widget registration to `classes/widgets-manager.php`, which loads a widget's control trait files before requiring that widget's class file, and each widget class uses the trait methods directly inside `register_controls()`.
- Q: How should Elementor class imports be handled after the split? -> A: Keep only the imports that are used directly in the current widget file, and add per-file imports inside each trait file for the Elementor classes referenced in that trait.

## User Scenarios & Testing *(mandatory)*

### User Story 1 - Keep Existing Widget Entry Files Stable (Priority: P1)

As a plugin maintainer, I want the current widget files to remain the entry points while
their controls move into smaller files so I can improve maintainability without changing the
plugin's widget loading flow.

**Why this priority**: The current request is limited to control separation. Moving full
widget logic at the same time would expand scope and increase regression risk.

**Independent Test**: Open any widget-owned folder and confirm its widget file still acts as the
main entry point while loading its control definitions from local control traits.

**Acceptance Scenarios**:

1. **Given** the current flat widget files, **When** the control refactor is complete,
   **Then** each existing widget file remains present and continues to own its widget class.
2. **Given** an existing widget behavior, **When** the controls are reorganized, **Then**
   the widget remains available and behaves the same for users.

---

### User Story 2 - Find Controls by Tab and Section (Priority: P2)

As a plugin maintainer, I want controls to be separated by content tab and style tab, with
separate files for distinct sections when a tab contains multiple sections, so I can find
the exact control group quickly.

**Why this priority**: Control definitions are the most repetitive part of widget
maintenance, and clear separation reduces editing time and confusion.

**Independent Test**: Review one widget that has multiple sections in a tab and confirm each
section is easy to locate through a clearly named control file.

**Acceptance Scenarios**:

1. **Given** a widget with multiple content-tab sections, **When** a maintainer navigates
   its controls, **Then** each content section is stored in its own clearly named file.
2. **Given** a widget with multiple style-tab sections, **When** a maintainer navigates its
   controls, **Then** each style section is stored in its own clearly named file.
3. **Given** a widget tab with only one section, **When** a maintainer opens that tab's
   controls, **Then** that tab still has its own separate file so the workflow stays
   consistent across all widgets.

---

### User Story 3 - Keep Navigation Simple (Priority: P3)

As a plugin maintainer, I want the folder structure to be only as modular as needed so the
project becomes easier to understand without forcing me through too many nested folders.

**Why this priority**: Over-separation can create a new navigation problem even if it solves
the original large-file problem.

**Independent Test**: A maintainer unfamiliar with the refactor can locate a widget file and
the needed control area within a short navigation path and without opening unrelated widget
folders.

**Acceptance Scenarios**:

1. **Given** the reorganized control structure, **When** a maintainer navigates from the
   existing widget file to a specific control section, **Then** the path is direct and naming
   is self-explanatory.
2. **Given** a simple widget area that does not need deeper separation, **When** the
   structure is reviewed, **Then** unnecessary nested layers and shared indirection are not
   introduced.

## Edge Cases

- A widget has only one content section or one style section and still requires its own tab
  file so junior maintainers can follow the same workflow in every widget.
- A widget has multiple sections in one tab but only one section in the other tab.
- Two sections have similar responsibilities and need distinct names so maintainers can tell
  them apart quickly.
- Two widgets have similar control logic, but the workflow still requires their control files
  to stay widget-owned instead of moving to shared files.
- The refactor changes control file locations, but all existing widget controls and output
  must still load correctly.

## Widget Coverage *(mandatory for this feature)*

The feature applies to these four existing widgets individually:

- **Comparison Table Widget**: MUST use `includes/widgets/comparison-table/saaspricing-comparison-table.php`
  as its widget entry file and keep its control definitions inside that widget-owned folder.
- **Horizontal Pricing Table Widget**: MUST keep
  `includes/widgets/horizontal-table/saaspricing-horizontal-table.php` as its widget entry
  file and keep its control definitions inside that widget-owned folder.
- **Pricelist Widget**: MUST use `includes/widgets/pricelist/saaspricing-pricelist.php` as
  its widget entry file and keep its control definitions inside that widget-owned folder.
- **Vertical Pricing Table Widget**: MUST keep
  `includes/widgets/saaspricing-vertical-table.php` as its widget entry file and move only
  its control definitions into its future widget-owned folder.

For each widget above, maintainers must be able to:

1. Locate the existing widget file without opening another widget's code first.
2. Locate the owning content-tab and style-tab trait files from that widget's local
   `controls/` directory.
3. Trace every moved control area from its legacy inline location to its new widget-owned
   location.

## Requirements *(mandatory)*

### Functional Requirements

- **FR-001**: The system MUST preserve all four existing widgets and keep the comparison
  table, horizontal pricing table, pricelist, and vertical pricing table widgets available
  to users after the reorganization.
- **FR-002**: The system MUST keep each widget file as the owning widget entry point
  for this phase of the refactor, even if that widget file moves into a widget-owned folder.
- **FR-003**: The system MUST provide a widget-owned directory for each widget, with local
  control files kept under that widget's `controls/` subtree.
- **FR-004**: The system MUST provide separate content-tab and style-tab control ownership
  for the comparison, horizontal, pricelist, and vertical widgets individually rather than
  only as a shared group rule.
- **FR-005**: The system MUST create separate `content-controls-manager.php` and
  `style-controls-manager.php` files for every
  widget, even when a tab contains only one section.
- **FR-006**: The system MUST place each distinct control section in its own file when a
  widget tab contains multiple sections, while still keeping the tab-level
  control manager file as the entry point for that tab.
- **FR-007**: The system MUST use tab-prefixed file names for section files, where a
  compliant name begins with `content-` for content-tab sections or `style-` for style-tab
  sections.
- **FR-008**: The system MUST keep the structure shallow and readable by limiting each widget
  to one widget-owned folder containing the widget file, `controls/content-controls-manager.php`,
  `controls/style-controls-manager.php`, and only the tab-prefixed section files required by
  multi-section tabs.
- **FR-009**: The system MUST keep widget-specific control logic widget-owned rather than
  moving it into shared files, shared control builders, or cross-widget helper modules as
  part of this refactor.
- **FR-010**: The system MUST load widget control trait files from `classes/widgets-manager.php`
  before the widget class files are required so widget classes can use those traits directly.
- **FR-011**: The system MUST keep existing widget behavior, available controls, rendered
  output, Elementor registration, and current asset loading boundaries unchanged unless a
  separately approved feature request says otherwise.
- **FR-012**: The system MUST make it possible for a maintainer to identify which files
  belong to a widget's content controls and style controls from inside that widget's own folder.
- **FR-013**: The widget class MUST use trait methods directly in `register_controls()`
  rather than including raw control snippets from inside the widget class file.
- **FR-014**: The system MUST preserve a documented old-to-new mapping for each moved control
  area within each widget.
- **FR-015**: Each widget file MUST keep only the Elementor imports used directly in that
  widget file, and each trait file MUST import the Elementor classes it references itself.

### Existing Behavior Impact *(mandatory for this project)*

- **EB-001**: The affected existing widgets are the comparison table, horizontal pricing
  table, pricelist, and vertical pricing table widgets, along with the controls they expose
  in content and style tabs.
- **EB-002**: This change preserves current behavior by reorganizing control code for
  maintainability without changing widget entry files, rendered output, widget availability,
  Elementor registration order, or asset boundaries.
- **EB-003**: No user-visible behavior change is intended as part of this feature.
- **EB-004**: The implementation MUST document the old-to-new mapping for each moved control
  area, including comparison, horizontal, pricelist, and vertical widget control ownership.

### Key Entities *(include if feature involves data)*

- **Widget Entry File**: The widget class file that remains the owning class file for one
  widget during this phase.
- **Control Tab Group**: The set of controls belonging to either the content tab or the
  style tab for one widget.
- **Control Section**: A named subset of controls within a tab that may require its own file
  when the tab contains multiple sections.

## Assumptions

- The feature applies to the four current widgets already shipped by the plugin.
- The comparison widget now uses a widget-owned folder structure and the remaining widgets
  will follow the same pattern as they are split.
- File naming may change for control files, but widget behavior and control availability
  remain the same.
- A direct, readable structure is preferred over maximum decomposition.
- Separate content-tab and style-tab trait files are required for every widget, including
  single-section tabs, to keep the workflow uniform for junior maintainers.
- Similar logic may be repeated across widget-owned trait files if that keeps navigation
  clearer than a shared abstraction.
- `includes/widget.php`, `classes/widgets-manager.php`, and the active widget files
  remain the runtime entry points for widget registration.
- Section files under `includes/widgets/<widget>/controls/` are implemented as traits so they
  can be composed by the widget's content/style control manager traits.

## Success Criteria *(mandatory)*

### Measurable Outcomes

- **SC-001**: A maintainer can locate the relevant control implementation area for each of
  the four widgets within 2 minutes per widget of opening the codebase.
- **SC-002**: A maintainer can identify whether a control file belongs to the content tab or
  style tab from its name alone in 100% of reviewed cases.
- **SC-003**: For widgets with multiple tab sections, maintainers can locate the intended
  section file without opening unrelated section files in at least 90% of review attempts.
- **SC-004**: The four existing widgets remain available after the refactor with no intended
  loss of controls or user-facing behavior, including Elementor registration and editor
  availability.
- **SC-005**: Existing affected widgets and assets continue to behave as documented after the
  change, with no intended regressions in plugin bootstrap, widget registration, editor
  controls, frontend rendering, or asset loading.
