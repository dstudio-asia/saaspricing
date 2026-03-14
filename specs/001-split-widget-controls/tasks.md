---

description: "Task list for separating widget controls only"
---

# Tasks: Separate Widget Controls

**Input**: Design documents from `/specs/001-split-widget-controls/`  
**Prerequisites**: plan.md (required), spec.md (required for user stories), research.md, data-model.md, contracts/, quickstart.md

**Tests**: Manual regression verification is REQUIRED for all structure changes because this feature preserves existing widget behavior while reorganizing control files.

**Organization**: Tasks are grouped by user story so each story can be implemented and validated independently.

## Format: `[ID] [P?] [Story] Description`

- **[P]**: Can run in parallel (different files, no dependencies)
- **[Story]**: Which user story this task belongs to (e.g. `US1`, `US2`, `US3`)
- Include exact file paths in descriptions

## Path Conventions

- **Plugin root**: `saaspricing.php`, `includes/`, `assets/`, `languages/`
- **Widget entry files**: `includes/widgets/comparison-table/saaspricing-comparison-table.php`, `includes/widgets/horizontal-table/saaspricing-horizontal-table.php`, `includes/widgets/pricelist/saaspricing-pricelist.php`, `includes/widgets/saaspricing-vertical-table.php`
- **Control files**: `includes/widgets/<widget>/controls/content-controls-manager.php`,
  `includes/widgets/<widget>/controls/style-controls-manager.php`, and tab-prefixed section files
- Every move task MUST preserve an old-to-new mapping for the touched control areas

## Phase 1: Setup

**Purpose**: Capture the current structure and prepare the target control folders before code moves begin

- [X] T001 Document the old-to-new control mapping plan in `specs/001-split-widget-controls/quickstart.md`
- [X] T002 Create the target widget-owned comparison control structure under `includes/widgets/comparison-table/controls/` and document the same target pattern for the remaining widgets

---

## Phase 2: Foundational

**Purpose**: Establish the control file scaffolding that all user stories depend on

**CRITICAL**: No user story work can begin until this phase is complete

- [X] T003 Create mandatory comparison top-level tab manager files `includes/widgets/comparison-table/controls/content-controls-manager.php` and `includes/widgets/comparison-table/controls/style-controls-manager.php`
- [X] T004 Update the old-to-new mapping notes in `specs/001-split-widget-controls/quickstart.md` for the foundational control moves
- [X] T004A Add `classes/widgets-manager.php` and update `includes/widget.php` to delegate widget trait loading and widget registration to it

**Checkpoint**: Control scaffolding is ready and the widget files can load the new control traits

---

## Phase 3: User Story 1 - Keep Existing Widget Entry Files Stable (Priority: P1)

**Goal**: Separate controls while preserving the current widget files, registration, and behavior

**Independent Test**: Open the codebase and confirm each existing widget file still owns its widget class while loading control definitions from widget-owned trait methods.

### Verification for User Story 1

- [X] T005 [US1] Record manual regression expectations for stable widget entry files in `specs/001-split-widget-controls/quickstart.md`

### Implementation for User Story 1

- [X] T006 [P] [US1] Update `includes/widgets/comparison-table/saaspricing-comparison-table.php` so it keeps widget logic in place, uses local comparison traits directly, and does not `require_once` raw control snippets inline
- [X] T007 [P] [US1] Update `includes/widgets/horizontal-table/saaspricing-horizontal-table.php` so it keeps widget logic in place, uses local horizontal traits directly, and does not `require_once` raw control snippets inline
- [X] T008 [P] [US1] Update `includes/widgets/pricelist/saaspricing-pricelist.php` so it keeps widget logic in place, uses local pricelist traits directly, and does not `require_once` raw control snippets inline
- [ ] T009 [P] [US1] Update `includes/widgets/saaspricing-vertical-table.php` so it keeps widget logic in place, uses vertical traits directly, and does not `require_once` its trait files inline
- [ ] T010 [US1] Verify the current widget files and registration flow remain unchanged after control extraction

**Checkpoint**: Existing widget files still own their classes and load correctly after the control split

---

## Phase 4: User Story 2 - Find Controls by Tab and Section (Priority: P2)

**Goal**: Split widget controls into dedicated content/style files and section files where tabs contain multiple sections

**Independent Test**: Inspect each widget-owned control directory and confirm content and style controls are separated, with tab-prefixed section trait files added where tabs contain multiple sections.

### Verification for User Story 2

- [X] T011 [US2] Add the per-widget control verification checklist to `specs/001-split-widget-controls/quickstart.md`

### Implementation for User Story 2

- [X] T012 [P] [US2] Extract comparison content-tab controls from `includes/widgets/comparison-table/saaspricing-comparison-table.php` into `includes/widgets/comparison-table/controls/content-controls-manager.php` and any required `includes/widgets/comparison-table/controls/content-controls/content-*.php` section traits
- [X] T013 [P] [US2] Extract comparison style-tab controls from `includes/widgets/comparison-table/saaspricing-comparison-table.php` into `includes/widgets/comparison-table/controls/style-controls-manager.php` and any required `includes/widgets/comparison-table/controls/style-controls/style-*.php` section traits
- [X] T014 [P] [US2] Extract horizontal content-tab and style-tab controls into `includes/widgets/horizontal-table/controls/content-controls-manager.php`, `includes/widgets/horizontal-table/controls/style-controls-manager.php`, and the required tab-prefixed section traits
- [X] T015 [P] [US2] Extract pricelist content-tab and style-tab controls into `includes/widgets/pricelist/controls/content-controls-manager.php`, `includes/widgets/pricelist/controls/style-controls-manager.php`, and the required tab-prefixed section traits
- [ ] T016 [P] [US2] Extract vertical content-tab and style-tab controls into a widget-owned folder with `controls/content-controls-manager.php`, `controls/style-controls-manager.php`, and any required tab-prefixed section traits
- [ ] T017 [US2] Verify every widget still has dedicated content and style control manager files even when a tab has only one section
- [ ] T018 [US2] Run the editor checks in `specs/001-split-widget-controls/quickstart.md` for content-tab and style-tab controls across comparison, horizontal, pricelist, and vertical widgets

**Checkpoint**: All widgets have tab-based control files and multi-section tabs are split into tab-prefixed section files

---

## Phase 5: User Story 3 - Keep Navigation Simple (Priority: P3)

**Goal**: Keep the reorganized control structure readable, shallow, and traceable for maintainers

**Independent Test**: A maintainer can navigate from an existing widget file to its control files and understand old-to-new mapping without opening unrelated widget files.

### Verification for User Story 3

- [ ] T019 [US3] Add navigation and mapping review steps to `specs/001-split-widget-controls/quickstart.md`

### Implementation for User Story 3

- [ ] T020 [P] [US3] Review and simplify file names in each widget-owned `controls/` directory so they remain tab-prefixed and self-explanatory
- [ ] T021 [US3] Update the old-to-new mapping in `specs/001-split-widget-controls/quickstart.md` to cover all moved control areas
- [ ] T022 [US3] Confirm `specs/001-split-widget-controls/contracts/widget-module-contract.md` still matches the implemented control layout and update it if file naming changed during the refactor
- [ ] T023 [US3] Run the quickstart navigation review by tracing each widget from `includes/widget.php` to `classes/widgets-manager.php`, then to its widget-owned controls, and then to its current widget file without relying on unrelated widget files

**Checkpoint**: The control layout is easy to navigate and fully traceable from legacy control locations to new paths

---

## Phase 6: Polish & Cross-Cutting Concerns

**Purpose**: Finish regression validation and clean up documentation after all stories land

- [ ] T024 [P] Update feature documentation in `specs/001-split-widget-controls/plan.md`, `specs/001-split-widget-controls/research.md`, and `specs/001-split-widget-controls/data-model.md` if implementation details changed
- [ ] T025 Run full quickstart regression validation from `specs/001-split-widget-controls/quickstart.md` across all four widgets in Elementor editor and frontend preview
- [ ] T026 Review the widget files and widget-owned `controls/` directories for dead inline-control code and leftover structural artifacts

---

## Dependencies & Execution Order

### Phase Dependencies

- **Setup (Phase 1)**: No dependencies; can start immediately
- **Foundational (Phase 2)**: Depends on Setup completion; blocks all user stories
- **User Story 1 (Phase 3)**: Starts after Foundational; establishes stable widget entry files
- **User Story 2 (Phase 4)**: Depends on User Story 1 because controls load from the current widget files
- **User Story 3 (Phase 5)**: Depends on User Story 2 because navigation review assumes final control-file layout
- **Polish (Phase 6)**: Depends on all user stories being complete

### User Story Dependencies

- **User Story 1 (P1)**: Independent first increment and MVP scope
- **User Story 2 (P2)**: Depends on the widget-owned control directories created in setup
- **User Story 3 (P3)**: Depends on the final control-file layout from US2

### Within Each User Story

- Verification tasks are defined before the story is considered complete
- Control extraction happens before navigation cleanup
- Story validation completes before moving to the next priority

### Parallel Opportunities

- T006-T009 can run in parallel once Phase 2 completes
- T012-T016 can run in parallel once the control scaffolding is stable
- T020 can be split by widget folder if multiple maintainers are available
- T024 can run in parallel with final verification preparation

---

## Parallel Example: User Story 1

```text
Task: "T006 [US1] Update comparison widget file to load separated control files"
Task: "T007 [US1] Update horizontal widget file to load separated control files"
Task: "T008 [US1] Update pricelist widget file to load separated control files"
Task: "T009 [US1] Update vertical widget file to load separated control files"
```

## Parallel Example: User Story 2

```text
Task: "T012 [US2] Extract comparison content-tab controls and section files"
Task: "T014 [US2] Extract horizontal tab controls and section files"
Task: "T015 [US2] Extract pricelist tab controls and section files"
Task: "T016 [US2] Extract vertical tab controls and section files"
```

## Implementation Strategy

### MVP First (User Story 1 Only)

1. Complete Phase 1: Setup
2. Complete Phase 2: Foundational
3. Complete Phase 3: User Story 1
4. Stop and validate that all four widgets still load from their current files
5. Continue only after the no-regression baseline is stable

### Incremental Delivery

1. Setup + Foundational -> target control structure is ready
2. Add User Story 1 -> current widget files remain stable and load separated controls
3. Add User Story 2 -> control files are separated by tab and section
4. Add User Story 3 -> naming, mapping, and navigation are finalized
5. Run Polish -> perform full regression validation across all widgets

### Parallel Team Strategy

1. One developer completes Setup and Foundational tasks
2. Current widget-file updates in US1 can be split across developers by widget
3. Control-file extraction in US2 can also be split across developers by widget
4. A final reviewer handles mapping, navigation validation, and full regression checks

---

## Notes

- All tasks follow the required checklist format with checkbox, task ID, optional `[P]`, story labels where required, and explicit file paths
- Manual regression checks are required because the feature must preserve existing Elementor behavior while moving controls out of the widget files
- User Story 1 is the suggested MVP because it stabilizes the current widget files before splitting every control section
