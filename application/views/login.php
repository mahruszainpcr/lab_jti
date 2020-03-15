<html lang="en">

<head>
    <meta charset="utf-8">
    <title>SiLab - JTI</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin &amp; Dashboard Template" name="description">
    <meta content="Themesdesign" name="author">
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- datepicker -->
    <link href="assets/libs/air-datepicker/css/datepicker.min.css" rel="stylesheet" type="text/css">

    <!-- jvectormap -->
    <link href="assets/libs/jqvmap/jqvmap.min.css" rel="stylesheet">

    <!-- Bootstrap Css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <!-- Icons Css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css">
    <!-- App Css-->
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css">

    <style>
    :root {
        --uim-primary-opacity: 1;
        --uim-secondary-opacity: 0.70;
        --uim-tertiary-opacity: 0.50;
        --uim-quaternary-opacity: 0.25;
        --uim-quinary-opacity: 0;
    }

    .uim-svg {
        display: inline-block;
        height: 1em;
        vertical-align: -0.125em;
        font-size: inherit;
        fill: var(--uim-color, currentColor);
    }

    .uim-svg svg {
        display: inline-block;
    }

    .uim-primary {
        opacity: var(--uim-primary-opacity);
    }

    .uim-secondary {
        opacity: var(--uim-secondary-opacity);
    }

    .uim-tertiary {
        opacity: var(--uim-tertiary-opacity);
    }

    .uim-quaternary {
        opacity: var(--uim-quaternary-opacity);
    }

    .uim-quinary {
        opacity: var(--uim-quinary-opacity);
    }
    </style>
    <style type="text/css">
    .apexcharts-canvas {
        position: relative;
        user-select: none;
        /* cannot give overflow: hidden as it will crop tooltips which overflow outside chart area */
    }

    /* scrollbar is not visible by default for legend, hence forcing the visibility */
    .apexcharts-canvas ::-webkit-scrollbar {
        -webkit-appearance: none;
        width: 6px;
    }

    .apexcharts-canvas ::-webkit-scrollbar-thumb {
        border-radius: 4px;
        background-color: rgba(0, 0, 0, .5);
        box-shadow: 0 0 1px rgba(255, 255, 255, .5);
        -webkit-box-shadow: 0 0 1px rgba(255, 255, 255, .5);
    }

    .apexcharts-canvas.apexcharts-theme-dark {
        background: #343F57;
    }

    .apexcharts-inner {
        position: relative;
    }

    .legend-mouseover-inactive {
        transition: 0.15s ease all;
        opacity: 0.20;
    }

    .apexcharts-series-collapsed {
        opacity: 0;
    }

    .apexcharts-gridline,
    .apexcharts-text {
        pointer-events: none;
    }

    .apexcharts-tooltip {
        border-radius: 5px;
        box-shadow: 2px 2px 6px -4px #999;
        cursor: default;
        font-size: 14px;
        left: 62px;
        opacity: 0;
        pointer-events: none;
        position: absolute;
        top: 20px;
        overflow: hidden;
        white-space: nowrap;
        z-index: 12;
        transition: 0.15s ease all;
    }

    .apexcharts-tooltip.apexcharts-theme-light {
        border: 1px solid #e3e3e3;
        background: rgba(255, 255, 255, 0.96);
    }

    .apexcharts-tooltip.apexcharts-theme-dark {
        color: #fff;
        background: rgba(30, 30, 30, 0.8);
    }

    .apexcharts-tooltip * {
        font-family: inherit;
    }

    .apexcharts-tooltip .apexcharts-marker,
    .apexcharts-area-series .apexcharts-area,
    .apexcharts-line {
        pointer-events: none;
    }

    .apexcharts-tooltip.apexcharts-active {
        opacity: 1;
        transition: 0.15s ease all;
    }

    .apexcharts-tooltip-title {
        padding: 6px;
        font-size: 15px;
        margin-bottom: 4px;
    }

    .apexcharts-tooltip.apexcharts-theme-light .apexcharts-tooltip-title {
        background: #ECEFF1;
        border-bottom: 1px solid #ddd;
    }

    .apexcharts-tooltip.apexcharts-theme-dark .apexcharts-tooltip-title {
        background: rgba(0, 0, 0, 0.7);
        border-bottom: 1px solid #333;
    }

    .apexcharts-tooltip-text-value,
    .apexcharts-tooltip-text-z-value {
        display: inline-block;
        font-weight: 600;
        margin-left: 5px;
    }

    .apexcharts-tooltip-text-z-label:empty,
    .apexcharts-tooltip-text-z-value:empty {
        display: none;
    }

    .apexcharts-tooltip-text-value,
    .apexcharts-tooltip-text-z-value {
        font-weight: 600;
    }

    .apexcharts-tooltip-marker {
        width: 12px;
        height: 12px;
        position: relative;
        top: 0px;
        margin-right: 10px;
        border-radius: 50%;
    }

    .apexcharts-tooltip-series-group {
        padding: 0 10px;
        display: none;
        text-align: left;
        justify-content: left;
        align-items: center;
    }

    .apexcharts-tooltip-series-group.apexcharts-active .apexcharts-tooltip-marker {
        opacity: 1;
    }

    .apexcharts-tooltip-series-group.apexcharts-active,
    .apexcharts-tooltip-series-group:last-child {
        padding-bottom: 4px;
    }

    .apexcharts-tooltip-series-group-hidden {
        opacity: 0;
        height: 0;
        line-height: 0;
        padding: 0 !important;
    }

    .apexcharts-tooltip-y-group {
        padding: 6px 0 5px;
    }

    .apexcharts-tooltip-candlestick {
        padding: 4px 8px;
    }

    .apexcharts-tooltip-candlestick>div {
        margin: 4px 0;
    }

    .apexcharts-tooltip-candlestick span.value {
        font-weight: bold;
    }

    .apexcharts-tooltip-rangebar {
        padding: 5px 8px;
    }

    .apexcharts-tooltip-rangebar .category {
        font-weight: 600;
        color: #777;
    }

    .apexcharts-tooltip-rangebar .series-name {
        font-weight: bold;
        display: block;
        margin-bottom: 5px;
    }

    .apexcharts-xaxistooltip {
        opacity: 0;
        padding: 9px 10px;
        pointer-events: none;
        color: #373d3f;
        font-size: 13px;
        text-align: center;
        border-radius: 2px;
        position: absolute;
        z-index: 10;
        background: #ECEFF1;
        border: 1px solid #90A4AE;
        transition: 0.15s ease all;
    }

    .apexcharts-xaxistooltip.apexcharts-theme-dark {
        background: rgba(0, 0, 0, 0.7);
        border: 1px solid rgba(0, 0, 0, 0.5);
        color: #fff;
    }

    .apexcharts-xaxistooltip:after,
    .apexcharts-xaxistooltip:before {
        left: 50%;
        border: solid transparent;
        content: " ";
        height: 0;
        width: 0;
        position: absolute;
        pointer-events: none;
    }

    .apexcharts-xaxistooltip:after {
        border-color: rgba(236, 239, 241, 0);
        border-width: 6px;
        margin-left: -6px;
    }

    .apexcharts-xaxistooltip:before {
        border-color: rgba(144, 164, 174, 0);
        border-width: 7px;
        margin-left: -7px;
    }

    .apexcharts-xaxistooltip-bottom:after,
    .apexcharts-xaxistooltip-bottom:before {
        bottom: 100%;
    }

    .apexcharts-xaxistooltip-top:after,
    .apexcharts-xaxistooltip-top:before {
        top: 100%;
    }

    .apexcharts-xaxistooltip-bottom:after {
        border-bottom-color: #ECEFF1;
    }

    .apexcharts-xaxistooltip-bottom:before {
        border-bottom-color: #90A4AE;
    }

    .apexcharts-xaxistooltip-bottom.apexcharts-theme-dark:after {
        border-bottom-color: rgba(0, 0, 0, 0.5);
    }

    .apexcharts-xaxistooltip-bottom.apexcharts-theme-dark:before {
        border-bottom-color: rgba(0, 0, 0, 0.5);
    }

    .apexcharts-xaxistooltip-top:after {
        border-top-color: #ECEFF1
    }

    .apexcharts-xaxistooltip-top:before {
        border-top-color: #90A4AE;
    }

    .apexcharts-xaxistooltip-top.apexcharts-theme-dark:after {
        border-top-color: rgba(0, 0, 0, 0.5);
    }

    .apexcharts-xaxistooltip-top.apexcharts-theme-dark:before {
        border-top-color: rgba(0, 0, 0, 0.5);
    }


    .apexcharts-xaxistooltip.apexcharts-active {
        opacity: 1;
        transition: 0.15s ease all;
    }

    .apexcharts-yaxistooltip {
        opacity: 0;
        padding: 4px 10px;
        pointer-events: none;
        color: #373d3f;
        font-size: 13px;
        text-align: center;
        border-radius: 2px;
        position: absolute;
        z-index: 10;
        background: #ECEFF1;
        border: 1px solid #90A4AE;
    }

    .apexcharts-yaxistooltip.apexcharts-theme-dark {
        background: rgba(0, 0, 0, 0.7);
        border: 1px solid rgba(0, 0, 0, 0.5);
        color: #fff;
    }

    .apexcharts-yaxistooltip:after,
    .apexcharts-yaxistooltip:before {
        top: 50%;
        border: solid transparent;
        content: " ";
        height: 0;
        width: 0;
        position: absolute;
        pointer-events: none;
    }

    .apexcharts-yaxistooltip:after {
        border-color: rgba(236, 239, 241, 0);
        border-width: 6px;
        margin-top: -6px;
    }

    .apexcharts-yaxistooltip:before {
        border-color: rgba(144, 164, 174, 0);
        border-width: 7px;
        margin-top: -7px;
    }

    .apexcharts-yaxistooltip-left:after,
    .apexcharts-yaxistooltip-left:before {
        left: 100%;
    }

    .apexcharts-yaxistooltip-right:after,
    .apexcharts-yaxistooltip-right:before {
        right: 100%;
    }

    .apexcharts-yaxistooltip-left:after {
        border-left-color: #ECEFF1;
    }

    .apexcharts-yaxistooltip-left:before {
        border-left-color: #90A4AE;
    }

    .apexcharts-yaxistooltip-left.apexcharts-theme-dark:after {
        border-left-color: rgba(0, 0, 0, 0.5);
    }

    .apexcharts-yaxistooltip-left.apexcharts-theme-dark:before {
        border-left-color: rgba(0, 0, 0, 0.5);
    }

    .apexcharts-yaxistooltip-right:after {
        border-right-color: #ECEFF1;
    }

    .apexcharts-yaxistooltip-right:before {
        border-right-color: #90A4AE;
    }

    .apexcharts-yaxistooltip-right.apexcharts-theme-dark:after {
        border-right-color: rgba(0, 0, 0, 0.5);
    }

    .apexcharts-yaxistooltip-right.apexcharts-theme-dark:before {
        border-right-color: rgba(0, 0, 0, 0.5);
    }

    .apexcharts-yaxistooltip.apexcharts-active {
        opacity: 1;
    }

    .apexcharts-yaxistooltip-hidden {
        display: none;
    }

    .apexcharts-xcrosshairs,
    .apexcharts-ycrosshairs {
        pointer-events: none;
        opacity: 0;
        transition: 0.15s ease all;
    }

    .apexcharts-xcrosshairs.apexcharts-active,
    .apexcharts-ycrosshairs.apexcharts-active {
        opacity: 1;
        transition: 0.15s ease all;
    }

    .apexcharts-ycrosshairs-hidden {
        opacity: 0;
    }

    .apexcharts-zoom-rect {
        pointer-events: none;
    }

    .apexcharts-selection-rect {
        cursor: move;
    }

    .svg_select_points,
    .svg_select_points_rot {
        opacity: 0;
        visibility: hidden;
    }

    .svg_select_points_l,
    .svg_select_points_r {
        cursor: ew-resize;
        opacity: 1;
        visibility: visible;
        fill: #888;
    }

    .apexcharts-canvas.apexcharts-zoomable .hovering-zoom {
        cursor: crosshair
    }

    .apexcharts-canvas.apexcharts-zoomable .hovering-pan {
        cursor: move
    }

    .apexcharts-xaxis,
    .apexcharts-yaxis {
        pointer-events: none;
    }

    .apexcharts-zoom-icon,
    .apexcharts-zoom-in-icon,
    .apexcharts-zoom-out-icon,
    .apexcharts-reset-zoom-icon,
    .apexcharts-pan-icon,
    .apexcharts-selection-icon,
    .apexcharts-menu-icon,
    .apexcharts-toolbar-custom-icon {
        cursor: pointer;
        width: 20px;
        height: 20px;
        line-height: 24px;
        color: #6E8192;
        text-align: center;
    }


    .apexcharts-zoom-icon svg,
    .apexcharts-zoom-in-icon svg,
    .apexcharts-zoom-out-icon svg,
    .apexcharts-reset-zoom-icon svg,
    .apexcharts-menu-icon svg {
        fill: #6E8192;
    }

    .apexcharts-selection-icon svg {
        fill: #444;
        transform: scale(0.76)
    }

    .apexcharts-theme-dark .apexcharts-zoom-icon svg,
    .apexcharts-theme-dark .apexcharts-zoom-in-icon svg,
    .apexcharts-theme-dark .apexcharts-zoom-out-icon svg,
    .apexcharts-theme-dark .apexcharts-reset-zoom-icon svg,
    .apexcharts-theme-dark .apexcharts-pan-icon svg,
    .apexcharts-theme-dark .apexcharts-selection-icon svg,
    .apexcharts-theme-dark .apexcharts-menu-icon svg,
    .apexcharts-theme-dark .apexcharts-toolbar-custom-icon svg {
        fill: #f3f4f5;
    }

    .apexcharts-canvas .apexcharts-zoom-icon.apexcharts-selected svg,
    .apexcharts-canvas .apexcharts-selection-icon.apexcharts-selected svg,
    .apexcharts-canvas .apexcharts-reset-zoom-icon.apexcharts-selected svg {
        fill: #008FFB;
    }

    .apexcharts-theme-light .apexcharts-selection-icon:not(.apexcharts-selected):hover svg,
    .apexcharts-theme-light .apexcharts-zoom-icon:not(.apexcharts-selected):hover svg,
    .apexcharts-theme-light .apexcharts-zoom-in-icon:hover svg,
    .apexcharts-theme-light .apexcharts-zoom-out-icon:hover svg,
    .apexcharts-theme-light .apexcharts-reset-zoom-icon:hover svg,
    .apexcharts-theme-light .apexcharts-menu-icon:hover svg {
        fill: #333;
    }

    .apexcharts-selection-icon,
    .apexcharts-menu-icon {
        position: relative;
    }

    .apexcharts-reset-zoom-icon {
        margin-left: 5px;
    }

    .apexcharts-zoom-icon,
    .apexcharts-reset-zoom-icon,
    .apexcharts-menu-icon {
        transform: scale(0.85);
    }

    .apexcharts-zoom-in-icon,
    .apexcharts-zoom-out-icon {
        transform: scale(0.7)
    }

    .apexcharts-zoom-out-icon {
        margin-right: 3px;
    }

    .apexcharts-pan-icon {
        transform: scale(0.62);
        position: relative;
        left: 1px;
        top: 0px;
    }

    .apexcharts-pan-icon svg {
        fill: #fff;
        stroke: #6E8192;
        stroke-width: 2;
    }

    .apexcharts-pan-icon.apexcharts-selected svg {
        stroke: #008FFB;
    }

    .apexcharts-pan-icon:not(.apexcharts-selected):hover svg {
        stroke: #333;
    }

    .apexcharts-toolbar {
        position: absolute;
        z-index: 11;
        top: 0px;
        right: 3px;
        max-width: 176px;
        text-align: right;
        border-radius: 3px;
        padding: 0px 6px 2px 6px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .apexcharts-toolbar svg {
        pointer-events: none;
    }

    .apexcharts-menu {
        background: #fff;
        position: absolute;
        top: 100%;
        border: 1px solid #ddd;
        border-radius: 3px;
        padding: 3px;
        right: 10px;
        opacity: 0;
        min-width: 110px;
        transition: 0.15s ease all;
        pointer-events: none;
    }

    .apexcharts-menu.apexcharts-menu-open {
        opacity: 1;
        pointer-events: all;
        transition: 0.15s ease all;
    }

    .apexcharts-menu-item {
        padding: 6px 7px;
        font-size: 12px;
        cursor: pointer;
    }

    .apexcharts-theme-light .apexcharts-menu-item:hover {
        background: #eee;
    }

    .apexcharts-theme-dark .apexcharts-menu {
        background: rgba(0, 0, 0, 0.7);
        color: #fff;
    }

    @media screen and (min-width: 768px) {
        .apexcharts-toolbar {
            /*opacity: 0;*/
        }

        .apexcharts-canvas:hover .apexcharts-toolbar {
            opacity: 1;
        }
    }

    .apexcharts-datalabel.apexcharts-element-hidden {
        opacity: 0;
    }

    .apexcharts-pie-label,
    .apexcharts-datalabels,
    .apexcharts-datalabel,
    .apexcharts-datalabel-label,
    .apexcharts-datalabel-value {
        cursor: default;
        pointer-events: none;
    }

    .apexcharts-pie-label-delay {
        opacity: 0;
        animation-name: opaque;
        animation-duration: 0.3s;
        animation-fill-mode: forwards;
        animation-timing-function: ease;
    }

    .apexcharts-canvas .apexcharts-element-hidden {
        opacity: 0;
    }

    .apexcharts-hide .apexcharts-series-points {
        opacity: 0;
    }

    .apexcharts-area-series .apexcharts-series-markers .apexcharts-marker.no-pointer-events,
    .apexcharts-line-series .apexcharts-series-markers .apexcharts-marker.no-pointer-events,
    .apexcharts-radar-series path,
    .apexcharts-radar-series polygon {
        pointer-events: none;
    }

    /* markers */

    .apexcharts-marker {
        transition: 0.15s ease all;
    }

    @keyframes opaque {
        0% {
            opacity: 0;
        }

        100% {
            opacity: 1;
        }
    }

    /* Resize generated styles */
    @keyframes resizeanim {
        from {
            opacity: 0;
        }

        to {
            opacity: 0;
        }
    }

    .resize-triggers {
        animation: 1ms resizeanim;
        visibility: hidden;
        opacity: 0;
    }

    .resize-triggers,
    .resize-triggers>div,
    .contract-trigger:before {
        content: " ";
        display: block;
        position: absolute;
        top: 0;
        left: 0;
        height: 100%;
        width: 100%;
        overflow: hidden;
    }

    .resize-triggers>div {
        background: #eee;
        overflow: auto;
    }

    .contract-trigger:before {
        width: 200%;
        height: 200%;
    }
    </style>
    <style>
    :root {
        --uim-primary-opacity: 1;
        --uim-secondary-opacity: 0.70;
        --uim-tertiary-opacity: 0.50;
        --uim-quaternary-opacity: 0.25;
        --uim-quinary-opacity: 0;
    }

    .uim-svg {
        display: inline-block;
        height: 1em;
        vertical-align: -0.125em;
        font-size: inherit;
        fill: var(--uim-color, currentColor);
    }

    .uim-svg svg {
        display: inline-block;
    }

    .uim-primary {
        opacity: var(--uim-primary-opacity);
    }

    .uim-secondary {
        opacity: var(--uim-secondary-opacity);
    }

    .uim-tertiary {
        opacity: var(--uim-tertiary-opacity);
    }

    .uim-quaternary {
        opacity: var(--uim-quaternary-opacity);
    }

    .uim-quinary {
        opacity: var(--uim-quinary-opacity);
    }
    </style>
    <style type="text/css">
    .apexcharts-canvas {
        position: relative;
        user-select: none;
        /* cannot give overflow: hidden as it will crop tooltips which overflow outside chart area */
    }

    /* scrollbar is not visible by default for legend, hence forcing the visibility */
    .apexcharts-canvas ::-webkit-scrollbar {
        -webkit-appearance: none;
        width: 6px;
    }

    .apexcharts-canvas ::-webkit-scrollbar-thumb {
        border-radius: 4px;
        background-color: rgba(0, 0, 0, .5);
        box-shadow: 0 0 1px rgba(255, 255, 255, .5);
        -webkit-box-shadow: 0 0 1px rgba(255, 255, 255, .5);
    }

    .apexcharts-canvas.apexcharts-theme-dark {
        background: #343F57;
    }

    .apexcharts-inner {
        position: relative;
    }

    .legend-mouseover-inactive {
        transition: 0.15s ease all;
        opacity: 0.20;
    }

    .apexcharts-series-collapsed {
        opacity: 0;
    }

    .apexcharts-gridline,
    .apexcharts-text {
        pointer-events: none;
    }

    .apexcharts-tooltip {
        border-radius: 5px;
        box-shadow: 2px 2px 6px -4px #999;
        cursor: default;
        font-size: 14px;
        left: 62px;
        opacity: 0;
        pointer-events: none;
        position: absolute;
        top: 20px;
        overflow: hidden;
        white-space: nowrap;
        z-index: 12;
        transition: 0.15s ease all;
    }

    .apexcharts-tooltip.apexcharts-theme-light {
        border: 1px solid #e3e3e3;
        background: rgba(255, 255, 255, 0.96);
    }

    .apexcharts-tooltip.apexcharts-theme-dark {
        color: #fff;
        background: rgba(30, 30, 30, 0.8);
    }

    .apexcharts-tooltip * {
        font-family: inherit;
    }

    .apexcharts-tooltip .apexcharts-marker,
    .apexcharts-area-series .apexcharts-area,
    .apexcharts-line {
        pointer-events: none;
    }

    .apexcharts-tooltip.apexcharts-active {
        opacity: 1;
        transition: 0.15s ease all;
    }

    .apexcharts-tooltip-title {
        padding: 6px;
        font-size: 15px;
        margin-bottom: 4px;
    }

    .apexcharts-tooltip.apexcharts-theme-light .apexcharts-tooltip-title {
        background: #ECEFF1;
        border-bottom: 1px solid #ddd;
    }

    .apexcharts-tooltip.apexcharts-theme-dark .apexcharts-tooltip-title {
        background: rgba(0, 0, 0, 0.7);
        border-bottom: 1px solid #333;
    }

    .apexcharts-tooltip-text-value,
    .apexcharts-tooltip-text-z-value {
        display: inline-block;
        font-weight: 600;
        margin-left: 5px;
    }

    .apexcharts-tooltip-text-z-label:empty,
    .apexcharts-tooltip-text-z-value:empty {
        display: none;
    }

    .apexcharts-tooltip-text-value,
    .apexcharts-tooltip-text-z-value {
        font-weight: 600;
    }

    .apexcharts-tooltip-marker {
        width: 12px;
        height: 12px;
        position: relative;
        top: 0px;
        margin-right: 10px;
        border-radius: 50%;
    }

    .apexcharts-tooltip-series-group {
        padding: 0 10px;
        display: none;
        text-align: left;
        justify-content: left;
        align-items: center;
    }

    .apexcharts-tooltip-series-group.apexcharts-active .apexcharts-tooltip-marker {
        opacity: 1;
    }

    .apexcharts-tooltip-series-group.apexcharts-active,
    .apexcharts-tooltip-series-group:last-child {
        padding-bottom: 4px;
    }

    .apexcharts-tooltip-series-group-hidden {
        opacity: 0;
        height: 0;
        line-height: 0;
        padding: 0 !important;
    }

    .apexcharts-tooltip-y-group {
        padding: 6px 0 5px;
    }

    .apexcharts-tooltip-candlestick {
        padding: 4px 8px;
    }

    .apexcharts-tooltip-candlestick>div {
        margin: 4px 0;
    }

    .apexcharts-tooltip-candlestick span.value {
        font-weight: bold;
    }

    .apexcharts-tooltip-rangebar {
        padding: 5px 8px;
    }

    .apexcharts-tooltip-rangebar .category {
        font-weight: 600;
        color: #777;
    }

    .apexcharts-tooltip-rangebar .series-name {
        font-weight: bold;
        display: block;
        margin-bottom: 5px;
    }

    .apexcharts-xaxistooltip {
        opacity: 0;
        padding: 9px 10px;
        pointer-events: none;
        color: #373d3f;
        font-size: 13px;
        text-align: center;
        border-radius: 2px;
        position: absolute;
        z-index: 10;
        background: #ECEFF1;
        border: 1px solid #90A4AE;
        transition: 0.15s ease all;
    }

    .apexcharts-xaxistooltip.apexcharts-theme-dark {
        background: rgba(0, 0, 0, 0.7);
        border: 1px solid rgba(0, 0, 0, 0.5);
        color: #fff;
    }

    .apexcharts-xaxistooltip:after,
    .apexcharts-xaxistooltip:before {
        left: 50%;
        border: solid transparent;
        content: " ";
        height: 0;
        width: 0;
        position: absolute;
        pointer-events: none;
    }

    .apexcharts-xaxistooltip:after {
        border-color: rgba(236, 239, 241, 0);
        border-width: 6px;
        margin-left: -6px;
    }

    .apexcharts-xaxistooltip:before {
        border-color: rgba(144, 164, 174, 0);
        border-width: 7px;
        margin-left: -7px;
    }

    .apexcharts-xaxistooltip-bottom:after,
    .apexcharts-xaxistooltip-bottom:before {
        bottom: 100%;
    }

    .apexcharts-xaxistooltip-top:after,
    .apexcharts-xaxistooltip-top:before {
        top: 100%;
    }

    .apexcharts-xaxistooltip-bottom:after {
        border-bottom-color: #ECEFF1;
    }

    .apexcharts-xaxistooltip-bottom:before {
        border-bottom-color: #90A4AE;
    }

    .apexcharts-xaxistooltip-bottom.apexcharts-theme-dark:after {
        border-bottom-color: rgba(0, 0, 0, 0.5);
    }

    .apexcharts-xaxistooltip-bottom.apexcharts-theme-dark:before {
        border-bottom-color: rgba(0, 0, 0, 0.5);
    }

    .apexcharts-xaxistooltip-top:after {
        border-top-color: #ECEFF1
    }

    .apexcharts-xaxistooltip-top:before {
        border-top-color: #90A4AE;
    }

    .apexcharts-xaxistooltip-top.apexcharts-theme-dark:after {
        border-top-color: rgba(0, 0, 0, 0.5);
    }

    .apexcharts-xaxistooltip-top.apexcharts-theme-dark:before {
        border-top-color: rgba(0, 0, 0, 0.5);
    }


    .apexcharts-xaxistooltip.apexcharts-active {
        opacity: 1;
        transition: 0.15s ease all;
    }

    .apexcharts-yaxistooltip {
        opacity: 0;
        padding: 4px 10px;
        pointer-events: none;
        color: #373d3f;
        font-size: 13px;
        text-align: center;
        border-radius: 2px;
        position: absolute;
        z-index: 10;
        background: #ECEFF1;
        border: 1px solid #90A4AE;
    }

    .apexcharts-yaxistooltip.apexcharts-theme-dark {
        background: rgba(0, 0, 0, 0.7);
        border: 1px solid rgba(0, 0, 0, 0.5);
        color: #fff;
    }

    .apexcharts-yaxistooltip:after,
    .apexcharts-yaxistooltip:before {
        top: 50%;
        border: solid transparent;
        content: " ";
        height: 0;
        width: 0;
        position: absolute;
        pointer-events: none;
    }

    .apexcharts-yaxistooltip:after {
        border-color: rgba(236, 239, 241, 0);
        border-width: 6px;
        margin-top: -6px;
    }

    .apexcharts-yaxistooltip:before {
        border-color: rgba(144, 164, 174, 0);
        border-width: 7px;
        margin-top: -7px;
    }

    .apexcharts-yaxistooltip-left:after,
    .apexcharts-yaxistooltip-left:before {
        left: 100%;
    }

    .apexcharts-yaxistooltip-right:after,
    .apexcharts-yaxistooltip-right:before {
        right: 100%;
    }

    .apexcharts-yaxistooltip-left:after {
        border-left-color: #ECEFF1;
    }

    .apexcharts-yaxistooltip-left:before {
        border-left-color: #90A4AE;
    }

    .apexcharts-yaxistooltip-left.apexcharts-theme-dark:after {
        border-left-color: rgba(0, 0, 0, 0.5);
    }

    .apexcharts-yaxistooltip-left.apexcharts-theme-dark:before {
        border-left-color: rgba(0, 0, 0, 0.5);
    }

    .apexcharts-yaxistooltip-right:after {
        border-right-color: #ECEFF1;
    }

    .apexcharts-yaxistooltip-right:before {
        border-right-color: #90A4AE;
    }

    .apexcharts-yaxistooltip-right.apexcharts-theme-dark:after {
        border-right-color: rgba(0, 0, 0, 0.5);
    }

    .apexcharts-yaxistooltip-right.apexcharts-theme-dark:before {
        border-right-color: rgba(0, 0, 0, 0.5);
    }

    .apexcharts-yaxistooltip.apexcharts-active {
        opacity: 1;
    }

    .apexcharts-yaxistooltip-hidden {
        display: none;
    }

    .apexcharts-xcrosshairs,
    .apexcharts-ycrosshairs {
        pointer-events: none;
        opacity: 0;
        transition: 0.15s ease all;
    }

    .apexcharts-xcrosshairs.apexcharts-active,
    .apexcharts-ycrosshairs.apexcharts-active {
        opacity: 1;
        transition: 0.15s ease all;
    }

    .apexcharts-ycrosshairs-hidden {
        opacity: 0;
    }

    .apexcharts-zoom-rect {
        pointer-events: none;
    }

    .apexcharts-selection-rect {
        cursor: move;
    }

    .svg_select_points,
    .svg_select_points_rot {
        opacity: 0;
        visibility: hidden;
    }

    .svg_select_points_l,
    .svg_select_points_r {
        cursor: ew-resize;
        opacity: 1;
        visibility: visible;
        fill: #888;
    }

    .apexcharts-canvas.apexcharts-zoomable .hovering-zoom {
        cursor: crosshair
    }

    .apexcharts-canvas.apexcharts-zoomable .hovering-pan {
        cursor: move
    }

    .apexcharts-xaxis,
    .apexcharts-yaxis {
        pointer-events: none;
    }

    .apexcharts-zoom-icon,
    .apexcharts-zoom-in-icon,
    .apexcharts-zoom-out-icon,
    .apexcharts-reset-zoom-icon,
    .apexcharts-pan-icon,
    .apexcharts-selection-icon,
    .apexcharts-menu-icon,
    .apexcharts-toolbar-custom-icon {
        cursor: pointer;
        width: 20px;
        height: 20px;
        line-height: 24px;
        color: #6E8192;
        text-align: center;
    }


    .apexcharts-zoom-icon svg,
    .apexcharts-zoom-in-icon svg,
    .apexcharts-zoom-out-icon svg,
    .apexcharts-reset-zoom-icon svg,
    .apexcharts-menu-icon svg {
        fill: #6E8192;
    }

    .apexcharts-selection-icon svg {
        fill: #444;
        transform: scale(0.76)
    }

    .apexcharts-theme-dark .apexcharts-zoom-icon svg,
    .apexcharts-theme-dark .apexcharts-zoom-in-icon svg,
    .apexcharts-theme-dark .apexcharts-zoom-out-icon svg,
    .apexcharts-theme-dark .apexcharts-reset-zoom-icon svg,
    .apexcharts-theme-dark .apexcharts-pan-icon svg,
    .apexcharts-theme-dark .apexcharts-selection-icon svg,
    .apexcharts-theme-dark .apexcharts-menu-icon svg,
    .apexcharts-theme-dark .apexcharts-toolbar-custom-icon svg {
        fill: #f3f4f5;
    }

    .apexcharts-canvas .apexcharts-zoom-icon.apexcharts-selected svg,
    .apexcharts-canvas .apexcharts-selection-icon.apexcharts-selected svg,
    .apexcharts-canvas .apexcharts-reset-zoom-icon.apexcharts-selected svg {
        fill: #008FFB;
    }

    .apexcharts-theme-light .apexcharts-selection-icon:not(.apexcharts-selected):hover svg,
    .apexcharts-theme-light .apexcharts-zoom-icon:not(.apexcharts-selected):hover svg,
    .apexcharts-theme-light .apexcharts-zoom-in-icon:hover svg,
    .apexcharts-theme-light .apexcharts-zoom-out-icon:hover svg,
    .apexcharts-theme-light .apexcharts-reset-zoom-icon:hover svg,
    .apexcharts-theme-light .apexcharts-menu-icon:hover svg {
        fill: #333;
    }

    .apexcharts-selection-icon,
    .apexcharts-menu-icon {
        position: relative;
    }

    .apexcharts-reset-zoom-icon {
        margin-left: 5px;
    }

    .apexcharts-zoom-icon,
    .apexcharts-reset-zoom-icon,
    .apexcharts-menu-icon {
        transform: scale(0.85);
    }

    .apexcharts-zoom-in-icon,
    .apexcharts-zoom-out-icon {
        transform: scale(0.7)
    }

    .apexcharts-zoom-out-icon {
        margin-right: 3px;
    }

    .apexcharts-pan-icon {
        transform: scale(0.62);
        position: relative;
        left: 1px;
        top: 0px;
    }

    .apexcharts-pan-icon svg {
        fill: #fff;
        stroke: #6E8192;
        stroke-width: 2;
    }

    .apexcharts-pan-icon.apexcharts-selected svg {
        stroke: #008FFB;
    }

    .apexcharts-pan-icon:not(.apexcharts-selected):hover svg {
        stroke: #333;
    }

    .apexcharts-toolbar {
        position: absolute;
        z-index: 11;
        top: 0px;
        right: 3px;
        max-width: 176px;
        text-align: right;
        border-radius: 3px;
        padding: 0px 6px 2px 6px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .apexcharts-toolbar svg {
        pointer-events: none;
    }

    .apexcharts-menu {
        background: #fff;
        position: absolute;
        top: 100%;
        border: 1px solid #ddd;
        border-radius: 3px;
        padding: 3px;
        right: 10px;
        opacity: 0;
        min-width: 110px;
        transition: 0.15s ease all;
        pointer-events: none;
    }

    .apexcharts-menu.apexcharts-menu-open {
        opacity: 1;
        pointer-events: all;
        transition: 0.15s ease all;
    }

    .apexcharts-menu-item {
        padding: 6px 7px;
        font-size: 12px;
        cursor: pointer;
    }

    .apexcharts-theme-light .apexcharts-menu-item:hover {
        background: #eee;
    }

    .apexcharts-theme-dark .apexcharts-menu {
        background: rgba(0, 0, 0, 0.7);
        color: #fff;
    }

    @media screen and (min-width: 768px) {
        .apexcharts-toolbar {
            /*opacity: 0;*/
        }

        .apexcharts-canvas:hover .apexcharts-toolbar {
            opacity: 1;
        }
    }

    .apexcharts-datalabel.apexcharts-element-hidden {
        opacity: 0;
    }

    .apexcharts-pie-label,
    .apexcharts-datalabels,
    .apexcharts-datalabel,
    .apexcharts-datalabel-label,
    .apexcharts-datalabel-value {
        cursor: default;
        pointer-events: none;
    }

    .apexcharts-pie-label-delay {
        opacity: 0;
        animation-name: opaque;
        animation-duration: 0.3s;
        animation-fill-mode: forwards;
        animation-timing-function: ease;
    }

    .apexcharts-canvas .apexcharts-element-hidden {
        opacity: 0;
    }

    .apexcharts-hide .apexcharts-series-points {
        opacity: 0;
    }

    .apexcharts-area-series .apexcharts-series-markers .apexcharts-marker.no-pointer-events,
    .apexcharts-line-series .apexcharts-series-markers .apexcharts-marker.no-pointer-events,
    .apexcharts-radar-series path,
    .apexcharts-radar-series polygon {
        pointer-events: none;
    }

    /* markers */

    .apexcharts-marker {
        transition: 0.15s ease all;
    }

    @keyframes opaque {
        0% {
            opacity: 0;
        }

        100% {
            opacity: 1;
        }
    }

    /* Resize generated styles */
    @keyframes resizeanim {
        from {
            opacity: 0;
        }

        to {
            opacity: 0;
        }
    }

    .resize-triggers {
        animation: 1ms resizeanim;
        visibility: hidden;
        opacity: 0;
    }

    .resize-triggers,
    .resize-triggers>div,
    .contract-trigger:before {
        content: " ";
        display: block;
        position: absolute;
        top: 0;
        left: 0;
        height: 100%;
        width: 100%;
        overflow: hidden;
    }

    .resize-triggers>div {
        background: #eee;
        overflow: auto;
    }

    .contract-trigger:before {
        width: 200%;
        height: 200%;
    }
    </style>
</head>

<body data-topbar="colored" data-layout="horizontal">

    <!-- Begin page -->
    <div id="layout-wrapper">

        <header id="page-topbar">
            <div class="navbar-header">
                <div class="container-fluid">


                    <!-- LOGO -->





                </div>
            </div>


        </header>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">

                <!-- Page-Title -->
                <div class="page-title-box">
                    <div class="container-fluid">


                    </div>
                </div>
                <!-- end page title end breadcrumb -->

                <div class="page-content-wrapper">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xl-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <h5>Selamat Datang di si-Lab</h5>
                                                <p class="text-muted">Jurusan Teknologi Informasi</p>

                                                <div class="mt-4 input-group">
                                                    <div class="input-group-prepend">
                                                        <a class="btn btn-primary" href="<?php echo $authUrl; ?>"
                                                            type="button" id="button-addon1">Login/Register</a>
                                                        <span class="input-group-text"> <img
                                                                src="https://www.freepnglogos.com/uploads/logo-gmail-png/logo-gmail-png-gmail-icon-download-png-and-vector-1.png"
                                                                alt="" style="width: 20;height: 20;"></span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-5 ml-auto">
                                                <img src="assets/images/widget-img.png" alt="" class="img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="header-title mb-4">Monthy sale Report</h5>
                                        <div class="media">
                                            <div class="media-body">
                                                <p class="text-muted mb-2">This month Sale</p>
                                                <h4>$ 13,425</h4>
                                            </div>
                                            <div dir="ltr" class="ml-2">
                                                <div style="display:inline;width:56px;height:56px;"><canvas width="44"
                                                        height="44" style="width: 56px; height: 56px;"></canvas>
                                                    <div style="display:inline;width:56px;height:56px;"><canvas
                                                            width="112" height="112"
                                                            style="width: 56px; height: 56px;"></canvas><input
                                                            data-plugin="knob" data-width="56" data-height="56"
                                                            data-linecap="round" data-displayinput="false"
                                                            data-fgcolor="#3051d3" value="56" data-skin="tron"
                                                            data-angleoffset="56" data-readonly="true"
                                                            data-thickness=".17" readonly="readonly"
                                                            style="display: none; width: 0px; visibility: hidden;">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="media">
                                            <div class="media-body">
                                                <p class="text-muted">Sale status</p>
                                                <h5 class="mb-0"> + 12 % <span class="font-size-14 text-muted ml-1">From
                                                        previous period</span></h5>
                                            </div>

                                            <div class="align-self-end ml-2">
                                                <a href="#" class="btn btn-primary btn-sm">View more</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-8">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="float-right ml-2">
                                            <a href="#">View all</a>
                                        </div>
                                        <h5 class="header-title mb-4">Latest Transaction</h5>

                                        <div class="table-responsive">
                                            <table class="table table-centered table-hover mb-0">
                                                <thead>
                                                    <tr>
                                                    <th>No</th>
                                                        <th>Level</th>
                                                        <th>Lab</th>
                                                        <th>Keperluan</th>
                                                        <th>Ketua Kegiatan</th>
                                                        <th>Nim Ketua</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    foreach ($data_peminjaman as $key => $value) {
                                                      ?>
                                                        <tr>
                                                          <td><?php echo $key+1; ?></td>
                                                          <td><?php echo $value->level; ?></td>
                                                          <td><?php echo $value->id_lab; ?></td>
                                                          <td><?php echo $value->keperluan; ?></td>
                                                          <td><?php echo $value->ketua_kegiatan; ?></td>
                                                          <td><?php echo $value->nim_ketua; ?></td>
                                                        </tr>
                                                      <?php
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="mt-4">
                                            <ul class="pagination pagination-rounded justify-content-center mb-0">
                                                <li class="page-item disabled">
                                                    <a class="page-link" href="#" aria-label="Previous">
                                                        <i class="mdi mdi-chevron-left"></i>
                                                    </a>
                                                </li>
                                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                                <!-- <li class="page-item"><a class="page-link" href="#">2</a></li>
                                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                <li class="page-item"><a class="page-link" href="#">4</a></li>
                                                <li class="page-item">
                                                    <a class="page-link" href="#" aria-label="Next">
                                                        <i class="mdi mdi-chevron-right"></i>
                                                    </a>
                                                </li> -->
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- end row -->


                        <!-- end row -->


                        <!-- end row -->
                    </div>
                    <!-- end container-fluid -->
                </div>
                <!-- end page-content-wrapper -->
            </div>
            <!-- End Page-content -->


            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            2020 © Xoric.
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-right d-none d-sm-block">
                                Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesdesign
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->



    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- JAVASCRIPT -->
    <script src="assets/libs/jquery/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/node-waves/waves.min.js"></script>

    <script src="https://unicons.iconscout.com/release/v2.0.1/script/monochrome/bundle.js"></script>

    <!-- datepicker -->
    <script src="assets/libs/air-datepicker/js/datepicker.min.js"></script>
    <script src="assets/libs/air-datepicker/js/i18n/datepicker.en.js"></script>

    <!-- apexcharts -->
    <script src="assets/libs/apexcharts/apexcharts.min.js"></script>

    <script src="assets/libs/jquery-knob/jquery.knob.min.js"></script>

    <!-- Jq vector map -->
    <script src="assets/libs/jqvmap/jquery.vmap.min.js"></script>
    <script src="assets/libs/jqvmap/maps/jquery.vmap.usa.js"></script>

    <script src="assets/js/pages/dashboard.init.js"></script>
    <div class="jqvmap-label" style="display: none;"></div>
    <div class="jqvmap-label" style="display: none;"></div>


    <script src="assets/js/app.js"></script>



    <svg id="SvgjsSvg1233" width="2" height="0" xmlns="http://www.w3.org/2000/svg" version="1.1"
        xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs"
        style="overflow: hidden; top: -100%; left: -100%; position: absolute; opacity: 0;">
        <defs id="SvgjsDefs1234"></defs>
        <polyline id="SvgjsPolyline1235" points="0,0"></polyline>
        <path id="SvgjsPath1236"
            d="M-1 236.41500000000002L-1 236.41500000000002L69.75639204545455 236.41500000000002L139.5127840909091 236.41500000000002L209.26917613636363 236.41500000000002L279.0255681818182 236.41500000000002L348.78196022727275 236.41500000000002L418.53835227272725 236.41500000000002L488.2947443181818 236.41500000000002L558.0511363636364 236.41500000000002L627.8075284090909 236.41500000000002L697.5639204545455 236.41500000000002L767.3203125 236.41500000000002C767.3203125 236.41500000000002 767.3203125 236.41500000000002 767.3203125 236.41500000000002C767.3203125 236.41500000000002 767.3203125 236.41500000000002 767.3203125 236.41500000000002C767.3203125 236.41500000000002 767.3203125 236.41500000000002 767.3203125 236.41500000000002C767.3203125 236.41500000000002 767.3203125 236.41500000000002 767.3203125 236.41500000000002C767.3203125 236.41500000000002 767.3203125 236.41500000000002 767.3203125 236.41500000000002C767.3203125 236.41500000000002 767.3203125 236.41500000000002 767.3203125 236.41500000000002C767.3203125 236.41500000000002 767.3203125 236.41500000000002 767.3203125 236.41500000000002C767.3203125 236.41500000000002 767.3203125 236.41500000000002 767.3203125 236.41500000000002C767.3203125 236.41500000000002 767.3203125 236.41500000000002 767.3203125 236.41500000000002C767.3203125 236.41500000000002 767.3203125 236.41500000000002 767.3203125 236.41500000000002C767.3203125 236.41500000000002 767.3203125 236.41500000000002 767.3203125 236.41500000000002C767.3203125 236.41500000000002 767.3203125 236.41500000000002 767.3203125 236.41500000000002 ">
        </path>
    </svg>
    <div class="datepickers-container" id="datepickers-container">
        <div class="datepicker -bottom-left- -from-bottom-"><i class="datepicker--pointer"></i>
            <nav class="datepicker--nav">
                <div class="datepicker--nav-action" data-action="prev"><svg>
                        <path d="M 17,12 l -5,5 l 5,5"></path>
                    </svg></div>
                <div class="datepicker--nav-title">February, <i>2020</i></div>
                <div class="datepicker--nav-action" data-action="next"><svg>
                        <path d="M 14,12 l 5,5 l -5,5"></path>
                    </svg></div>
            </nav>
            <div class="datepicker--content">
                <div class="datepicker--days datepicker--body active">
                    <div class="datepicker--days-names">
                        <div class="datepicker--day-name -weekend-">Su</div>
                        <div class="datepicker--day-name">Mo</div>
                        <div class="datepicker--day-name">Tu</div>
                        <div class="datepicker--day-name">We</div>
                        <div class="datepicker--day-name">Th</div>
                        <div class="datepicker--day-name">Fr</div>
                        <div class="datepicker--day-name -weekend-">Sa</div>
                    </div>
                    <div class="datepicker--cells datepicker--cells-days">
                        <div class="datepicker--cell datepicker--cell-day -weekend- -other-month-" data-date="26"
                            data-month="0" data-year="2020">26</div>
                        <div class="datepicker--cell datepicker--cell-day -other-month-" data-date="27" data-month="0"
                            data-year="2020">27</div>
                        <div class="datepicker--cell datepicker--cell-day -other-month-" data-date="28" data-month="0"
                            data-year="2020">28</div>
                        <div class="datepicker--cell datepicker--cell-day -other-month-" data-date="29" data-month="0"
                            data-year="2020">29</div>
                        <div class="datepicker--cell datepicker--cell-day -other-month-" data-date="30" data-month="0"
                            data-year="2020">30</div>
                        <div class="datepicker--cell datepicker--cell-day -other-month-" data-date="31" data-month="0"
                            data-year="2020">31</div>
                        <div class="datepicker--cell datepicker--cell-day -weekend-" data-date="1" data-month="1"
                            data-year="2020">1</div>
                        <div class="datepicker--cell datepicker--cell-day -weekend-" data-date="2" data-month="1"
                            data-year="2020">2</div>
                        <div class="datepicker--cell datepicker--cell-day" data-date="3" data-month="1"
                            data-year="2020">3</div>
                        <div class="datepicker--cell datepicker--cell-day" data-date="4" data-month="1"
                            data-year="2020">4</div>
                        <div class="datepicker--cell datepicker--cell-day" data-date="5" data-month="1"
                            data-year="2020">5</div>
                        <div class="datepicker--cell datepicker--cell-day" data-date="6" data-month="1"
                            data-year="2020">6</div>
                        <div class="datepicker--cell datepicker--cell-day" data-date="7" data-month="1"
                            data-year="2020">7</div>
                        <div class="datepicker--cell datepicker--cell-day -weekend-" data-date="8" data-month="1"
                            data-year="2020">8</div>
                        <div class="datepicker--cell datepicker--cell-day -weekend-" data-date="9" data-month="1"
                            data-year="2020">9</div>
                        <div class="datepicker--cell datepicker--cell-day" data-date="10" data-month="1"
                            data-year="2020">10</div>
                        <div class="datepicker--cell datepicker--cell-day" data-date="11" data-month="1"
                            data-year="2020">11</div>
                        <div class="datepicker--cell datepicker--cell-day" data-date="12" data-month="1"
                            data-year="2020">12</div>
                        <div class="datepicker--cell datepicker--cell-day" data-date="13" data-month="1"
                            data-year="2020">13</div>
                        <div class="datepicker--cell datepicker--cell-day" data-date="14" data-month="1"
                            data-year="2020">14</div>
                        <div class="datepicker--cell datepicker--cell-day -weekend-" data-date="15" data-month="1"
                            data-year="2020">15</div>
                        <div class="datepicker--cell datepicker--cell-day -weekend-" data-date="16" data-month="1"
                            data-year="2020">16</div>
                        <div class="datepicker--cell datepicker--cell-day" data-date="17" data-month="1"
                            data-year="2020">17</div>
                        <div class="datepicker--cell datepicker--cell-day" data-date="18" data-month="1"
                            data-year="2020">18</div>
                        <div class="datepicker--cell datepicker--cell-day" data-date="19" data-month="1"
                            data-year="2020">19</div>
                        <div class="datepicker--cell datepicker--cell-day" data-date="20" data-month="1"
                            data-year="2020">20</div>
                        <div class="datepicker--cell datepicker--cell-day" data-date="21" data-month="1"
                            data-year="2020">21</div>
                        <div class="datepicker--cell datepicker--cell-day -weekend-" data-date="22" data-month="1"
                            data-year="2020">22</div>
                        <div class="datepicker--cell datepicker--cell-day -weekend-" data-date="23" data-month="1"
                            data-year="2020">23</div>
                        <div class="datepicker--cell datepicker--cell-day" data-date="24" data-month="1"
                            data-year="2020">24</div>
                        <div class="datepicker--cell datepicker--cell-day" data-date="25" data-month="1"
                            data-year="2020">25</div>
                        <div class="datepicker--cell datepicker--cell-day" data-date="26" data-month="1"
                            data-year="2020">26</div>
                        <div class="datepicker--cell datepicker--cell-day" data-date="27" data-month="1"
                            data-year="2020">27</div>
                        <div class="datepicker--cell datepicker--cell-day" data-date="28" data-month="1"
                            data-year="2020">28</div>
                        <div class="datepicker--cell datepicker--cell-day -weekend- -current-" data-date="29"
                            data-month="1" data-year="2020">29</div>
                    </div>
                </div>
            </div>
        </div>
    </div><svg id="SvgjsSvg1001" width="2" height="0" xmlns="http://www.w3.org/2000/svg" version="1.1"
        xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs"
        style="overflow: hidden; top: -100%; left: -100%; position: absolute; opacity: 0;">
        <defs id="SvgjsDefs1002"></defs>
        <polyline id="SvgjsPolyline1003" points="0,0"></polyline>
        <path id="SvgjsPath1004" d="M0 0 "></path>
    </svg>
</body>

</html>