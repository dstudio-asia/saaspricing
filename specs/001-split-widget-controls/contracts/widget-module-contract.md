# Widget Module Contract

## Purpose

Define the structural contract for each widget's control files during this phase of the
refactor.

## Required Layout Per Widget

```text
includes/widgets/
`-- <widget>/
    |-- saaspricing-<widget>.php
    `-- controls/
        |-- content-controls-manager.php
        |-- style-controls-manager.php
        |-- content-controls/
        |   `-- content-<section>.php   # when the content tab has multiple sections
        `-- style-controls/
            `-- style-<section>.php     # when the style tab has multiple sections
```

## Behavioral Rules

- The widget-owned `saaspricing-<widget>.php` file remains the widget entry file.
- `content-controls-manager.php` always exists.
- `style-controls-manager.php` always exists.
- Multi-section tabs add one file per section with a tab-prefixed file name.
- Widget-specific control logic stays inside the owning widget's `controls/` directory.
- Section file naming must make it obvious whether a file belongs to the content or style
  tab.
- No shared widget-control modules or cross-widget helper files are introduced by this
  refactor.
- `content-controls-manager.php` and `style-controls-manager.php` are aggregator traits that
  call the widget's section-trait methods.
- Section files are traits, not raw include snippets.
- Widget files keep only the imports they use directly.
- Trait files import the Elementor classes they reference themselves.

## Acceptance Rules

- A maintainer can open a widget file and locate its control files without entering unrelated
  widget files.
- Control availability and rendered output remain equivalent to the current widget behavior.
- The resulting structure stays shallow: one widget-owned folder, the widget file,
  `controls/content-controls-manager.php`, `controls/style-controls-manager.php`, and only
  the tab-prefixed section files required by multi-section tabs.
