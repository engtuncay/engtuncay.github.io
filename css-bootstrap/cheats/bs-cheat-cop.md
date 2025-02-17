
Source : github copilot, https://github.com/copilot/c/0503dba6-9875-4023-9d3f-cb92fdcde722

# Bootstrap 5 Cheat Sheet

## Layout
- **Container**: `.container`, `.container-fluid`, `.container-{breakpoint}`
- **Grid**: `.row`, `.col`, `.col-{breakpoint}-{number}`, `.col-{breakpoint}-auto`
- **Gutters**: `.g-{number}`, `.gx-{number}`, `.gy-{number}`
- **Display**: `.d-{value}`, `.d-{breakpoint}-{value}`

## Content
- **Typography**: `.h1`-`.h6`, `.lead`, `.display-{number}`, `.text-{value}`, `.fw-{value}`, `.fst-{value}`
- **Images**: `.img-fluid`, `.img-thumbnail`, `.rounded`, `.rounded-{value}`
- **Tables**: `.table`, `.table-{modifier}`, `.table-{breakpoint}-{modifier}`
- **Figures**: `.figure`, `.figure-img`, `.figure-caption`

## Forms
- **Form Control**: `.form-control`, `.form-control-{modifier}`
- **Select**: `.form-select`, `.form-select-{modifier}`
- **Checks and Radios**: `.form-check`, `.form-check-input`, `.form-check-label`
- **Range**: `.form-range`
- **Input Group**: `.input-group`, `.input-group-{modifier}`
- **Floating Labels**: `.form-floating`

## Components
- **Alerts**: `.alert`, `.alert-{color}`
- **Badges**: `.badge`, `.bg-{color}`
- **Breadcrumb**: `.breadcrumb`, `.breadcrumb-item`
- **Buttons**: `.btn`, `.btn-{color}`, `.btn-{size}`
- **Button Group**: `.btn-group`, `.btn-group-{size}`
- **Cards**: `.card`, `.card-{modifier}`, `.card-body`, `.card-header`, `.card-footer`
- **Carousel**: `.carousel`, `.carousel-inner`, `.carousel-item`
- **Collapse**: `.collapse`
- **Dropdowns**: `.dropdown`, `.dropdown-menu`, `.dropdown-item`
- **List Group**: `.list-group`, `.list-group-item`, `.list-group-item-{modifier}`
- **Modal**: `.modal`, `.modal-dialog`, `.modal-content`
- **Navs**: `.nav`, `.nav-item`, `.nav-link`, `.nav-{modifier}`
- **Navbar**: `.navbar`, `.navbar-{modifier}`, `.navbar-{breakpoint}-{modifier}`
- **Pagination**: `.pagination`, `.page-item`, `.page-link`
- **Popovers**: `.popover`, `.popover-header`, `.popover-body`
- **Progress**: `.progress`, `.progress-bar`
- **Spinners**: `.spinner-border`, `.spinner-grow`
- **Toasts**: `.toast`, `.toast-header`, `.toast-body`
- **Tooltips**: `.tooltip`

## Utilities
- **Borders**: `.border`, `.border-{value}`, `.border-{side}-{value}`
- **Colors**: `.text-{color}`, `.bg-{color}`
- **Flex**: `.d-flex`, `.flex-{modifier}`, `.align-items-{modifier}`, `.justify-content-{modifier}`
- **Float**: `.float-{modifier}`, `.float-{breakpoint}-{modifier}`
- **Interactions**: `.user-select-{value}`, `.pointer-event-{value}`
- **Overflow**: `.overflow-{value}`
- **Position**: `.position-{value}`, `.top-{value}`, `.end-{value}`, `.bottom-{value}`, `.start-{value}`
- **Shadows**: `.shadow`, `.shadow-{value}`
- **Sizing**: `.w-{value}`, `.h-{value}`, `.mw-{value}`, `.mh-{value}`
- **Spacing**: `.m{side}-{value}`, `.p{side}-{value}`, `.gap-{value}`
- **Text**: `.text-{value}`, `.text-{breakpoint}-{value}`
- **Vertical Align**: `.align-{value}`, `.align-{breakpoint}-{value}`
- **Visibility**: `.visible`, `.invisible`

### Sizing (`h`, `w`, `m` Values)
- **Width (`w-`) Values**: `25`, `50`, `75`, `100`, `auto`
- **Height (`h-`) Values**: `25`, `50`, `75`, `100`, `auto`
- **Margin (`m-`, `mt-`, `mb-`, `ms-`, `me-`) Values**: `0`, `1`, `2`, `3`, `4`, `5`, `auto`
- **Padding (`p-`, `pt-`, `pb-`, `ps-`, `pe-`) Values**: `0`, `1`, `2`, `3`, `4`, `5`

### Notes
- `{breakpoint}`: sm, md, lg, xl, xxl
- `{value}`: start, end, center, between, around, etc.
- `{modifier}`: primary, secondary, success, danger, warning, info, light, dark, white, transparent, etc.

For more detailed information, please refer to the [Bootstrap 5 documentation](https://getbootstrap.com/docs/5.0/getting-started/introduction/).