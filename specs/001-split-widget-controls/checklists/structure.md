# Structure Checklist: Separate Widget Controls

**Purpose**: Validate the quality, clarity, completeness, and traceability of the widget
control refactor requirements before implementation and review  
**Created**: 2026-03-14  
**Feature**: [spec.md](/C:/xampp/htdocs/marquee-addons/wp-content/plugins/saaspricing/specs/001-split-widget-controls/spec.md)

**Note**: This checklist tests whether the written requirements are strong enough for
planning and review. It does not test implementation behavior.

## Requirement Completeness

- [x] CHK001 Are requirements stated for each of the four widgets individually, not only as
      a shared group? [Completeness, Spec §FR-001, Spec §EB-001]
- [x] CHK002 Does the spec define that the current widget files remain the widget entry
      points for this phase? [Completeness, Spec §FR-002]
- [x] CHK003 Are separate requirements documented for content-tab files and style-tab files
      for every widget? [Completeness, Spec §FR-004, Spec §FR-005]
- [x] CHK004 Does the spec define what happens when a widget tab has multiple sections
      without requiring section names to be enumerated? [Completeness, Spec §FR-006]
- [x] CHK005 Are old-to-new mapping requirements documented for moved control areas?
      [Completeness, Spec §FR-012, Spec §EB-004]

## Requirement Clarity

- [x] CHK006 Is the widget-owned trait-directory boundary clear enough that reviewers can
      distinguish it from a widget-logic move? [Clarity, Spec §FR-003, Plan §Structure Decision]
- [x] CHK007 Is "tab-prefixed names" specific enough to judge naming compliance without
      inventing additional naming rules? [Clarity, Spec §FR-007]
- [x] CHK008 Is "not too modular" translated into objective structure constraints rather than
      left as a subjective preference? [Clarity, Spec §FR-008, Spec §User Story 3]
- [x] CHK009 Is the difference between the current widget file and separated control files
      defined clearly enough for review? [Ambiguity, Spec §FR-011]

## Requirement Consistency

- [x] CHK010 Do the no-shared-files requirements align across the clarifications,
      functional requirements, assumptions, and plan structure? [Consistency, Spec
      §Clarifications, Spec §FR-009, Plan §Project Structure]
- [x] CHK011 Do the no-regression requirements align between functional requirements,
      existing behavior impact, success criteria, and the bootstrap contract? [Consistency,
      Spec §FR-010, Spec §EB-002, Spec §SC-004, Contracts §Bootstrap Contract]
- [x] CHK012 Do the single-section tab rules align with the generic multi-section split rule
      without conflict? [Consistency, Spec §Clarifications, Spec §FR-005, Spec §FR-006]

## Acceptance Criteria Quality

- [x] CHK013 Can the "locate within 2 minutes" outcome be evaluated consistently for each
      widget rather than only once across the feature? [Measurability, Spec §SC-001]
- [x] CHK014 Are the naming and navigation success criteria measurable enough to support
      objective review of the written requirements? [Acceptance Criteria, Spec §SC-002, Spec
      §SC-003]
- [x] CHK015 Do the success criteria cover both structural maintainability and preservation
      of existing widget behavior? [Coverage, Spec §SC-001, Spec §SC-004, Spec §SC-005]

## Scenario Coverage

- [x] CHK016 Are requirement expectations defined for comparison, horizontal, pricelist, and
      vertical widgets individually where their control complexity differs? [Coverage, Spec
      §EB-001, Gap]
- [x] CHK017 Are requirements defined for both primary navigation scenarios: locating a
      current widget file and locating a control area within that widget? [Coverage, Spec
      §User Story 1, Spec §User Story 2]
- [x] CHK018 Does the written scope distinguish control reorganization from excluded widget
      logic moves, renames, or asset refactors? [Coverage, Spec §FR-010, Plan §Summary, Plan
      §Constitution Check]

## Edge Case Coverage

- [x] CHK019 Are edge-case requirements documented for widgets that have one section in one
      tab and multiple sections in the other tab? [Edge Case, Spec §Edge Cases]
- [x] CHK020 Are requirements defined for similar-looking sections or similar widget control
      logic so naming ambiguity can be reviewed before implementation? [Edge Case, Spec
      §Edge Cases, Gap]
- [x] CHK021 Are migration-traceability requirements sufficient to catch cases where one
      control area is omitted from the written mapping? [Edge Case, Spec §EB-004]

## Non-Functional Requirements

- [x] CHK022 Are maintainability expectations specified in a way reviewers can evaluate
      without relying on subjective judgment alone? [Non-Functional, Spec §User Story 3,
      Spec §SC-001]
- [x] CHK023 Are compatibility-preservation requirements specified for plugin bootstrap,
      Elementor registration, current widget files, and asset loading boundaries?
      [Non-Functional, Plan §Constitution Check, Contracts §Bootstrap Contract]

## Dependencies & Assumptions

- [x] CHK024 Are the assumptions about keeping repeated logic inside widget-owned trait
      files explicitly documented and non-conflicting with the constitution's modularity
      rules? [Assumption, Spec §Assumptions, Constitution §Core Principles]
- [x] CHK025 Are dependency boundaries documented clearly enough to show which files remain
      orchestrators and widget entry files versus which files become separated control
      modules? [Dependency, Plan §Project Structure, Contracts §Widget Module Contract]

## Ambiguities & Conflicts

- [x] CHK026 Is there any unresolved ambiguity about whether section names must be listed in
      the spec for each widget, or is the generic rule intentionally sufficient? [Ambiguity,
      Spec §FR-006, Assumption]
- [x] CHK027 Do the requirements avoid implying that shared helpers will exist for
      widget-specific controls after the refactor? [Conflict, Spec §FR-009, Plan §Research
      Decision 5]
- [x] CHK028 Is a reviewer able to trace every major structural rule back to a specific
      requirement or clarification entry? [Traceability, Spec §Clarifications, Spec §FR-003,
      Spec §FR-009, Spec §FR-012]

## Notes

- Focus areas used: widget-by-widget coverage, control mapping traceability, structure and
  no-regression consistency.
- Generic section splitting was treated as intentional; the checklist tests whether the
  requirement is explicit enough without forcing section enumeration.
