<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="img/logo gki sulsel.png" />

    <!-- Bootstrap CSS -->
    {{-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" /> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('front/asset/css/styles.css') }}" />
    <link rel="stylesheet" href="{{ asset('front/asset/css/warta.css') }}" />
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">

    <title>GKI SulSel Pos Tigaraksa</title>
    <style>
        .g-6,
        .gx-6 {
            --bs-gutter-x: 3.5rem
        }

        .g-6,
        .gy-6 {
            --bs-gutter-y: 3.5rem
        }

        .g-7,
        .gx-7 {
            --bs-gutter-x: 4rem
        }

        .g-7,
        .gy-7 {
            --bs-gutter-y: 4rem
        }

        .g-8,
        .gx-8 {
            --bs-gutter-x: 4.5rem
        }

        .g-8,
        .gy-8 {
            --bs-gutter-y: 4.5rem
        }

        .g-9,
        .gx-9 {
            --bs-gutter-x: 5rem
        }

        .g-9,
        .gy-9 {
            --bs-gutter-y: 5rem
        }

        .g-10,
        .gx-10 {
            --bs-gutter-x: 5.5rem
        }

        .g-10,
        .gy-10 {
            --bs-gutter-y: 5.5rem
        }

        @media(min-width:576px) {

            .g-sm-6,
            .gx-sm-6 {
                --bs-gutter-x: 3.5rem
            }

            .g-sm-6,
            .gy-sm-6 {
                --bs-gutter-y: 3.5rem
            }

            .g-sm-7,
            .gx-sm-7 {
                --bs-gutter-x: 4rem
            }

            .g-sm-7,
            .gy-sm-7 {
                --bs-gutter-y: 4rem
            }

            .g-sm-8,
            .gx-sm-8 {
                --bs-gutter-x: 4.5rem
            }

            .g-sm-8,
            .gy-sm-8 {
                --bs-gutter-y: 4.5rem
            }

            .g-sm-9,
            .gx-sm-9 {
                --bs-gutter-x: 5rem
            }

            .g-sm-9,
            .gy-sm-9 {
                --bs-gutter-y: 5rem
            }

            .g-sm-10,
            .gx-sm-10 {
                --bs-gutter-x: 5.5rem
            }

            .g-sm-10,
            .gy-sm-10 {
                --bs-gutter-y: 5.5rem
            }
        }

        @media(min-width:768px) {

            .g-md-6,
            .gx-md-6 {
                --bs-gutter-x: 3.5rem
            }

            .g-md-6,
            .gy-md-6 {
                --bs-gutter-y: 3.5rem
            }

            .g-md-7,
            .gx-md-7 {
                --bs-gutter-x: 4rem
            }

            .g-md-7,
            .gy-md-7 {
                --bs-gutter-y: 4rem
            }

            .g-md-8,
            .gx-md-8 {
                --bs-gutter-x: 4.5rem
            }

            .g-md-8,
            .gy-md-8 {
                --bs-gutter-y: 4.5rem
            }

            .g-md-9,
            .gx-md-9 {
                --bs-gutter-x: 5rem
            }

            .g-md-9,
            .gy-md-9 {
                --bs-gutter-y: 5rem
            }

            .g-md-10,
            .gx-md-10 {
                --bs-gutter-x: 5.5rem
            }

            .g-md-10,
            .gy-md-10 {
                --bs-gutter-y: 5.5rem
            }
        }

        @media(min-width:992px) {

            .g-lg-6,
            .gx-lg-6 {
                --bs-gutter-x: 3.5rem
            }

            .g-lg-6,
            .gy-lg-6 {
                --bs-gutter-y: 3.5rem
            }

            .g-lg-7,
            .gx-lg-7 {
                --bs-gutter-x: 4rem
            }

            .g-lg-7,
            .gy-lg-7 {
                --bs-gutter-y: 4rem
            }

            .g-lg-8,
            .gx-lg-8 {
                --bs-gutter-x: 4.5rem
            }

            .g-lg-8,
            .gy-lg-8 {
                --bs-gutter-y: 4.5rem
            }

            .g-lg-9,
            .gx-lg-9 {
                --bs-gutter-x: 5rem
            }

            .g-lg-9,
            .gy-lg-9 {
                --bs-gutter-y: 5rem
            }

            .g-lg-10,
            .gx-lg-10 {
                --bs-gutter-x: 5.5rem
            }

            .g-lg-10,
            .gy-lg-10 {
                --bs-gutter-y: 5.5rem
            }
        }

        @media(min-width:1200px) {

            .g-xl-6,
            .gx-xl-6 {
                --bs-gutter-x: 3.5rem
            }

            .g-xl-6,
            .gy-xl-6 {
                --bs-gutter-y: 3.5rem
            }

            .g-xl-7,
            .gx-xl-7 {
                --bs-gutter-x: 4rem
            }

            .g-xl-7,
            .gy-xl-7 {
                --bs-gutter-y: 4rem
            }

            .g-xl-8,
            .gx-xl-8 {
                --bs-gutter-x: 4.5rem
            }

            .g-xl-8,
            .gy-xl-8 {
                --bs-gutter-y: 4.5rem
            }

            .g-xl-9,
            .gx-xl-9 {
                --bs-gutter-x: 5rem
            }

            .g-xl-9,
            .gy-xl-9 {
                --bs-gutter-y: 5rem
            }

            .g-xl-10,
            .gx-xl-10 {
                --bs-gutter-x: 5.5rem
            }

            .g-xl-10,
            .gy-xl-10 {
                --bs-gutter-y: 5.5rem
            }
        }

        @media(min-width:1400px) {

            .g-xxl-6,
            .gx-xxl-6 {
                --bs-gutter-x: 3.5rem
            }

            .g-xxl-6,
            .gy-xxl-6 {
                --bs-gutter-y: 3.5rem
            }

            .g-xxl-7,
            .gx-xxl-7 {
                --bs-gutter-x: 4rem
            }

            .g-xxl-7,
            .gy-xxl-7 {
                --bs-gutter-y: 4rem
            }

            .g-xxl-8,
            .gx-xxl-8 {
                --bs-gutter-x: 4.5rem
            }

            .g-xxl-8,
            .gy-xxl-8 {
                --bs-gutter-y: 4.5rem
            }

            .g-xxl-9,
            .gx-xxl-9 {
                --bs-gutter-x: 5rem
            }

            .g-xxl-9,
            .gy-xxl-9 {
                --bs-gutter-y: 5rem
            }

            .g-xxl-10,
            .gx-xxl-10 {
                --bs-gutter-x: 5.5rem
            }

            .g-xxl-10,
            .gy-xxl-10 {
                --bs-gutter-y: 5.5rem
            }
        }

        .fs-7 {
            font-size: .875rem !important
        }

        .mt-6 {
            margin-top: 3.5rem !important
        }

        .mt-7 {
            margin-top: 4rem !important
        }

        .mt-8 {
            margin-top: 4.5rem !important
        }

        .mt-9 {
            margin-top: 5rem !important
        }

        .mt-10 {
            margin-top: 5.5rem !important
        }

        .mt-auto {
            margin-top: auto !important
        }

        .mb-6 {
            margin-bottom: 3.5rem !important
        }

        .mb-7 {
            margin-bottom: 4rem !important
        }

        .mb-8 {
            margin-bottom: 4.5rem !important
        }

        .mb-9 {
            margin-bottom: 5rem !important
        }

        .mb-10 {
            margin-bottom: 5.5rem !important
        }

        .mb-auto {
            margin-bottom: auto !important
        }

        @media(min-width:576px) {
            .mt-sm-6 {
                margin-top: 3.5rem !important
            }

            .mt-sm-7 {
                margin-top: 4rem !important
            }

            .mt-sm-8 {
                margin-top: 4.5rem !important
            }

            .mt-sm-9 {
                margin-top: 5rem !important
            }

            .mt-sm-10 {
                margin-top: 5.5rem !important
            }

            .mt-sm-auto {
                margin-top: auto !important
            }

            .mb-sm-6 {
                margin-bottom: 3.5rem !important
            }

            .mb-sm-7 {
                margin-bottom: 4rem !important
            }

            .mb-sm-8 {
                margin-bottom: 4.5rem !important
            }

            .mb-sm-9 {
                margin-bottom: 5rem !important
            }

            .mb-sm-10 {
                margin-bottom: 5.5rem !important
            }

            .mb-sm-auto {
                margin-bottom: auto !important
            }
        }

        @media(min-width:768px) {
            .mt-md-6 {
                margin-top: 3.5rem !important
            }

            .mt-md-7 {
                margin-top: 4rem !important
            }

            .mt-md-8 {
                margin-top: 4.5rem !important
            }

            .mt-md-9 {
                margin-top: 5rem !important
            }

            .mt-md-10 {
                margin-top: 5.5rem !important
            }

            .mt-md-auto {
                margin-top: auto !important
            }

            .mb-md-6 {
                margin-bottom: 3.5rem !important
            }

            .mb-md-7 {
                margin-bottom: 4rem !important
            }

            .mb-md-8 {
                margin-bottom: 4.5rem !important
            }

            .mb-md-9 {
                margin-bottom: 5rem !important
            }

            .mb-md-10 {
                margin-bottom: 5.5rem !important
            }

            .mb-md-auto {
                margin-bottom: auto !important
            }
        }

        @media(min-width:992px) {
            .mt-lg-6 {
                margin-top: 3.5rem !important
            }

            .mt-lg-7 {
                margin-top: 4rem !important
            }

            .mt-lg-8 {
                margin-top: 4.5rem !important
            }

            .mt-lg-9 {
                margin-top: 5rem !important
            }

            .mt-lg-10 {
                margin-top: 5.5rem !important
            }

            .mt-lg-auto {
                margin-top: auto !important
            }

            .mb-lg-6 {
                margin-bottom: 3.5rem !important
            }

            .mb-lg-7 {
                margin-bottom: 4rem !important
            }

            .mb-lg-8 {
                margin-bottom: 4.5rem !important
            }

            .mb-lg-9 {
                margin-bottom: 5rem !important
            }

            .mb-lg-10 {
                margin-bottom: 5.5rem !important
            }

            .mb-lg-auto {
                margin-bottom: auto !important
            }
        }

        @media(min-width:1200px) {
            .mt-xl-6 {
                margin-top: 3.5rem !important
            }

            .mt-xl-7 {
                margin-top: 4rem !important
            }

            .mt-xl-8 {
                margin-top: 4.5rem !important
            }

            .mt-xl-9 {
                margin-top: 5rem !important
            }

            .mt-xl-10 {
                margin-top: 5.5rem !important
            }

            .mt-xl-auto {
                margin-top: auto !important
            }

            .mb-xl-6 {
                margin-bottom: 3.5rem !important
            }

            .mb-xl-7 {
                margin-bottom: 4rem !important
            }

            .mb-xl-8 {
                margin-bottom: 4.5rem !important
            }

            .mb-xl-9 {
                margin-bottom: 5rem !important
            }

            .mb-xl-10 {
                margin-bottom: 5.5rem !important
            }

            .mb-xl-auto {
                margin-bottom: auto !important
            }
        }

        @media(min-width:1400px) {
            .mt-xxl-6 {
                margin-top: 3.5rem !important
            }

            .mt-xxl-7 {
                margin-top: 4rem !important
            }

            .mt-xxl-8 {
                margin-top: 4.5rem !important
            }

            .mt-xxl-9 {
                margin-top: 5rem !important
            }

            .mt-xxl-10 {
                margin-top: 5.5rem !important
            }

            .mt-xxl-auto {
                margin-top: auto !important
            }

            .mb-xxl-6 {
                margin-bottom: 3.5rem !important
            }

            .mb-xxl-7 {
                margin-bottom: 4rem !important
            }

            .mb-xxl-8 {
                margin-bottom: 4.5rem !important
            }

            .mb-xxl-9 {
                margin-bottom: 5rem !important
            }

            .mb-xxl-10 {
                margin-bottom: 5.5rem !important
            }

            .mb-xxl-auto {
                margin-bottom: auto !important
            }
        }

        .bsb-animated {
            --bsb-animation-duration: 1s;
            animation-duration: var(--bsb-animation-duration);
            animation-fill-mode: both
        }

        @keyframes bsb-fadeIn {
            0% {
                opacity: 0
            }

            to {
                opacity: 1
            }
        }

        .bsb-fadeIn {
            animation-name: bsb-fadeIn
        }

        @keyframes bsb-fadeInUp {
            0% {
                opacity: 0;
                transform: translate3d(0, 100%, 0)
            }

            to {
                opacity: 1;
                transform: translateZ(0)
            }
        }

        .bsb-fadeInUp {
            animation-name: bsb-fadeInUp
        }

        @keyframes bsb-fadeInDown {
            0% {
                opacity: 0;
                transform: translate3d(0, -100%, 0)
            }

            to {
                opacity: 1;
                transform: translateZ(0)
            }
        }

        .bsb-fadeInDown {
            animation-name: bsb-fadeInDown
        }

        @keyframes bsb-fadeInLeft {
            0% {
                opacity: 0;
                transform: translate3d(-100%, 0, 0)
            }

            to {
                opacity: 1;
                transform: translateZ(0)
            }
        }

        .bsb-fadeInLeft {
            animation-name: bsb-fadeInLeft
        }

        @keyframes bsb-fadeInRight {
            0% {
                opacity: 0;
                transform: translate3d(100%, 0, 0)
            }

            to {
                opacity: 1;
                transform: translateZ(0)
            }
        }

        .bsb-fadeInRight {
            animation-name: bsb-fadeInRight
        }

        @keyframes bsb-fadeOut {
            0% {
                opacity: 1
            }

            to {
                opacity: 0
            }
        }

        .bsb-fadeOut {
            animation-name: bsb-fadeOut
        }

        @keyframes bsb-fadeOutUp {
            0% {
                opacity: 1
            }

            to {
                opacity: 0;
                transform: translate3d(0, -100%, 0)
            }
        }

        .bsb-fadeOutUp {
            animation-name: bsb-fadeOutUp
        }

        @keyframes bsb-fadeOutDown {
            0% {
                opacity: 1
            }

            to {
                opacity: 0;
                transform: translate3d(0, 100%, 0)
            }
        }

        .bsb-fadeOutDown {
            animation-name: bsb-fadeOutDown
        }

        @keyframes bsb-fadeOutLeft {
            0% {
                opacity: 1
            }

            to {
                opacity: 0;
                transform: translate3d(-100%, 0, 0)
            }
        }

        .bsb-fadeOutLeft {
            animation-name: bsb-fadeOutLeft
        }

        @keyframes bsb-fadeOutRight {
            0% {
                opacity: 1
            }

            to {
                opacity: 0;
                transform: translate3d(100%, 0, 0)
            }
        }

        .bsb-fadeOutRight {
            animation-name: bsb-fadeOutRight
        }

        @keyframes bsb-zoomIn {
            0% {
                opacity: 0;
                transform: scale3d(.3, .3, .3)
            }

            50% {
                opacity: 1
            }
        }

        .bsb-zoomIn {
            animation-name: bsb-zoomIn
        }

        .bsb-btn-xl {
            --bs-btn-padding-y: 0.625rem;
            --bs-btn-padding-x: 1.25rem;
            --bs-btn-font-size: calc(1.26rem + 0.12vw);
            --bs-btn-border-radius: var(--bs-border-radius-lg)
        }

        @media(min-width:1200px) {
            .bsb-btn-xl {
                --bs-btn-font-size: 1.35rem
            }
        }

        .bsb-btn-2xl {
            --bs-btn-padding-y: 0.75rem;
            --bs-btn-padding-x: 1.5rem;
            --bs-btn-font-size: calc(1.27rem + 0.24vw);
            --bs-btn-border-radius: var(--bs-border-radius-lg)
        }

        @media(min-width:1200px) {
            .bsb-btn-2xl {
                --bs-btn-font-size: 1.45rem
            }
        }

        .bsb-btn-3xl {
            --bs-btn-padding-y: 0.875rem;
            --bs-btn-padding-x: 1.75rem;
            --bs-btn-font-size: calc(1.28rem + 0.36vw);
            --bs-btn-border-radius: var(--bs-border-radius-lg)
        }

        @media(min-width:1200px) {
            .bsb-btn-3xl {
                --bs-btn-font-size: 1.55rem
            }
        }

        .bsb-btn-4xl {
            --bs-btn-padding-y: 1rem;
            --bs-btn-padding-x: 2rem;
            --bs-btn-font-size: calc(1.29rem + 0.48vw);
            --bs-btn-border-radius: var(--bs-border-radius-lg)
        }

        @media(min-width:1200px) {
            .bsb-btn-4xl {
                --bs-btn-font-size: 1.65rem
            }
        }

        .bsb-btn-5xl {
            --bs-btn-padding-y: 1.125rem;
            --bs-btn-padding-x: 2.25rem;
            --bs-btn-font-size: calc(1.3rem + 0.6vw);
            --bs-btn-border-radius: var(--bs-border-radius-lg)
        }

        @media(min-width:1200px) {
            .bsb-btn-5xl {
                --bs-btn-font-size: 1.75rem
            }
        }

        .bsb-overlay {
            --bsb-overlay-opacity: 0.5;
            --bsb-overlay-bg-color: var(--bs-black-rgb);
            position: relative
        }

        .bsb-overlay:after {
            background-color: rgba(var(--bsb-overlay-bg-color), var(--bsb-overlay-opacity));
            bottom: 0;
            content: "";
            display: block;
            left: 0;
            position: absolute;
            right: 0;
            top: 0;
            z-index: 0
        }

        .bsb-overlay>* {
            position: relative;
            z-index: 1
        }

        .bsb-overlay-figure {
            --bsb-overlay-figure-opacity: 0.5;
            --bsb-overlay-figure-bg-color: var(--bs-black-rgb);
            position: relative
        }

        .bsb-overlay-figure:after {
            background-color: rgba(var(--bsb-overlay-figure-bg-color), var(--bsb-overlay-figure-opacity));
            bottom: 0;
            content: "";
            display: block;
            left: 0;
            position: absolute;
            right: 0;
            top: 0
        }

        .bsb-overlay-hover {
            --bsb-overlay-hover-opacity: 0.5;
            --bsb-overlay-hover-bg-color: var(--bs-black-rgb);
            position: relative
        }

        .bsb-overlay-hover>a {
            bottom: 0;
            display: block;
            left: 0;
            position: relative;
            right: 0;
            top: 0
        }

        .bsb-overlay-hover>a>img.bsb-scale {
            --bsb-scale: 1
        }

        .bsb-overlay-hover>a>img.bsb-scale,
        .bsb-overlay-hover>a>img.bsb-scale-up {
            transform: scale3d(var(--bsb-scale), var(--bsb-scale), var(--bsb-scale));
            transform-style: preserve-3d;
            transition: transform .5s
        }

        .bsb-overlay-hover>a>img.bsb-scale-up {
            --bsb-scale: 1.2
        }

        .bsb-overlay-hover>a:after {
            background-color: rgba(var(--bsb-overlay-hover-bg-color), var(--bsb-overlay-hover-opacity));
            content: "";
            cursor: pointer !important;
            display: block;
            z-index: 0
        }

        .bsb-overlay-hover>a:after,
        .bsb-overlay-hover>figcaption {
            bottom: 0;
            left: 0;
            opacity: 0;
            position: absolute;
            right: 0;
            top: 0
        }

        .bsb-overlay-hover>figcaption {
            align-items: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
            pointer-events: none;
            z-index: 1
        }

        .bsb-overlay-hover>figcaption>* {
            opacity: 0
        }

        .bsb-overlay-hover:hover>a>img.bsb-hover-scale {
            --bsb-scale-hover: 1;
            transform: scale3d(var(--bsb-scale-hover), var(--bsb-scale-hover), var(--bsb-scale-hover))
        }

        .bsb-overlay-hover:hover>a>img.bsb-hover-scale-up {
            --bsb-scale-hover: 1.2;
            transform: scale3d(var(--bsb-scale-hover), var(--bsb-scale-hover), var(--bsb-scale-hover))
        }

        .bsb-overlay-hover:hover>a:after {
            opacity: 1;
            transition: opacity .15s linear
        }

        .bsb-overlay-hover:hover>figcaption {
            opacity: 1;
            transition: opacity .15s linear .1s
        }

        .bsb-overlay-hover:hover>figcaption>.bsb-hover-fadeIn {
            --bsb-animation-duration: 500ms;
            animation-duration: var(--bsb-animation-duration);
            animation-fill-mode: both;
            animation-name: bsb-fadeIn
        }

        .bsb-overlay-hover:hover>figcaption>.bsb-hover-fadeInUp {
            --bsb-animation-duration: 500ms;
            animation-duration: var(--bsb-animation-duration);
            animation-fill-mode: both;
            animation-name: bsb-fadeInUp
        }

        .bsb-overlay-hover:hover>figcaption>.bsb-hover-fadeInDown {
            --bsb-animation-duration: 500ms;
            animation-duration: var(--bsb-animation-duration);
            animation-fill-mode: both;
            animation-name: bsb-fadeInDown
        }

        .bsb-overlay-hover:hover>figcaption>.bsb-hover-fadeInLeft {
            --bsb-animation-duration: 500ms;
            animation-duration: var(--bsb-animation-duration);
            animation-fill-mode: both;
            animation-name: bsb-fadeInLeft
        }

        .bsb-overlay-hover:hover>figcaption>.bsb-hover-fadeInRight {
            --bsb-animation-duration: 500ms;
            animation-duration: var(--bsb-animation-duration);
            animation-fill-mode: both;
            animation-name: bsb-fadeInRight
        }

        .bsb-overlay-hover:hover>figcaption>.bsb-hover-zoomIn {
            --bsb-animation-duration: 500ms;
            animation-duration: var(--bsb-animation-duration);
            animation-fill-mode: both;
            animation-name: bsb-zoomIn
        }

        .title a {
            text-decoration: none !important;
        }

        .custom-card {
            border-top-left-radius: 20px;
            /* Sudut kiri atas rounded */
            border-top-right-radius: 20px;
            /* Sudut kanan atas rounded */
            border-bottom-left-radius: 20px;
            /* Sudut kiri bawah rounded */
            border-bottom-right-radius: 20px;
            /* Sudut kanan bawah rounded */
            -webkit-box-shadow: 0px 0px 9px 3px rgba(166, 166, 166, 1);
            -moz-box-shadow: 0px 0px 9px 3px rgba(166, 166, 166, 1);
            box-shadow: 0px 0px 9px 3px rgba(166, 166, 166, 1);
        }

        .card {
            margin: 15px;
        }

        .card-img-top {
            width: 100%;
            height: auto;
            object-fit: cover;
        }

        .icon-text {
            display: flex;
            align-items: center;
        }

        .icon-text i {
            margin-right: 8px;
        }

        .justify-between {
            display: flex;
            justify-content: space-between;
        }

        .info_social a {
            text-decoration: none;
        }

        a{
          text-decoration: none !important;
        }
    </style>

</head>

<body>
    <nav class="nav_atas" style="background-color: #327e3f">
        <div class="info_social container my-1">
            <a class="" href="">
                <i class="fab fa-facebook-f"></i>
            </a>
            <a href="">
                <i class="fab fa-whatsapp"></i>
            </a>
            <a href="">
                <i class="fab fa-youtube"></i> </a>
            <a href="">
                <i class="fab fa-instagram"></i>
            </a>
        </div>
    </nav>
    <!-- Nav & Hero -->
    <div class="container">
        <div class="card custom-card my-4 navbar-dark">
            <!-- Nav -->
            @include('layouts.front.header')
            <!-- End Nav -->
            <div
                style="
            background-image: url({{ asset('front/asset/img/hero/hero123.png') }});
            background-size: cover;
            border-bottom-left-radius: 20px;
            border-bottom-right-radius: 20px;
            height: 200px;
          ">
            </div>
        </div>
    </div>
    <!-- End Nav & Hero -->


    <div class="container">
        <div class="card custom-card my-5" style="background-color: rgba(255, 255, 255, 0.58)">
            <div class="container bootstrap snippets bootdeys">
                <div class="row mx-5 my-2">


                    <section class="bsb-blog-5 py-3 py-md-5 py-xl-8" id="berita">
                        <div class="container">
                          <div class="row justify-content-md-center mt-5">
                            <div class="col-12 col-md-10 col-lg-8 col-xl-7 col-xxl-6">
                                <h2 class="display-5 mb-3 mb-md-4 text-center">Berita Terbaru</h2>
                                <hr class="w-50 mx-auto mb-4 mb-xl-5 border-dark-subtle">


                                <div class="col-12">
                                    <form action="{{ route('front.warta') }}" method="GET">

                                        <div class="row ">
                                            <div class="col-lg-4 col">
                                                <input type="date" class="form-control" name="t" placeholder="Search">
                                            </div>
                                            <div class="col-lg-6 col">
                                                <input type="text" class="form-control" name="b" placeholder="Search">
                                            </div>
                                            <div class="col">
                                                <button class="btn btn-primary">Cari</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                        </div>


                        <div class="container overflow-hidden mt-3">
                            <div class="row gy-4 gy-md-5 gx-xl-6 gy-xl-6 gx-xxl-9 gy-xxl-9">


                                @foreach ($berita as $item)
                                    <div class="col-12 col-lg-4">
                                        <article>
                                            <div class="card border-0 bg-transparent">
                                                <figure class="card-img-top mb-4 overflow-hidden bsb-overlay-hover">
                                                    <a href="{{ route('front.berita.detail', $item->id) }}">
                                                        <img class="img-fluid bsb-scale bsb-hover-scale-up"
                                                            loading="lazy"
                                                            src="{{ asset('storage/berita/' . $item->thumbnail) }}"
                                                            alt="Living">
                                                    </a>
                                                    <figcaption>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="32"
                                                            height="32" fill="currentColor"
                                                            class="bi bi-eye text-white bsb-hover-fadeInLeft"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                                            <path
                                                                d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                                        </svg>
                                                        <h4 class="h6 text-white bsb-hover-fadeInRight mt-2">Lihat</h4>
                                                    </figcaption>
                                                </figure>
                                                <div class="card-body m-0 p-0">
                                                    <div class="entry-header mb-3">

                                                        <h2 class="card-title entry-title h4 m-0">
                                                            <a class="link-dark text-decoration-none"
                                                                href="#!">{{ $item->judul }}</a>
                                                        </h2>
                                                    </div>
                                                </div>
                                                <div class="card-footer border-0 bg-transparent p-0 m-0">
                                                    <ul class="entry-meta list-unstyled d-flex align-items-center m-0">
                                                        <li>
                                                            <a class="fs-7 link-secondary text-decoration-none d-flex align-items-center"
                                                                href="#!">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="14"
                                                                    height="14" fill="currentColor"
                                                                    class="bi bi-calendar3" viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M14 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857V3.857z" />
                                                                    <path
                                                                        d="M6.5 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                                                                </svg>
                                                                <span
                                                                    class="ms-2 fs-7 ">{{ date('d M Y', strtotime($item->tanggal_publish)) }}</span>
                                                            </a>
                                                        </li>

                                                    </ul>
                                                </div>
                                            </div>
                                        </article>
                                    </div>
                                @endforeach

                            </div>
                        </div>

                    </section>
                </div>
            </div>
        </div>
    </div>

    <div class="container" id="warta">
        <div class="card custom-card my-5" style="background-color: rgba(255, 255, 255, 0.58)">
            <div class="container bootstrap snippets bootdeys">
                <div class="row justify-content-md-center mt-5">
                    <div class="col-12 col-md-10 col-lg-8 col-xl-7 col-xxl-6">
                        <h2 class="display-5 mb-3 mb-md-4 text-center">Jadwal Ibadah & Petugas</h2>
                        <hr class="w-50 mx-auto mb-4 mb-xl-5 border-dark-subtle">


                        <div class="col-12">
                            <form action="{{ route('front.warta') }}" method="GET">

                                <div class="row ">
                                    <div class="col-lg-4 col">
                                        <input type="date" class="form-control" name="d" placeholder="Search">
                                    </div>
                                    <div class="col-lg-6 col">
                                        <input type="text" class="form-control" name="q" placeholder="Search">
                                    </div>
                                    <div class="col">
                                        <button class="btn btn-primary">Cari</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
                <div class="row mt-3">



                    @foreach ($warta as $item)
                        <div class="col-12 col-md-6 col-lg-4 ">
                            <a href="{{ route('front.detailWarta', $item->id) }}" class="">
                                <div class="card">
                                    <div class="px-3 py-2">
                                        <img src="{{ asset('storage/warta/' . $item->gambar) }}"
                                            class="card-img-top mx-auto d-block" alt="Card Image" />
                                    </div>
                                    <div class="card-body">
                                        <div class="icon-text mb-3">
                                            <i class="fas fa-calendar-alt text-secondary"></i>
                                            <span class="text-secondary">{{ $item->tanggal_kegiatan->isoFormat('D MMMM YYYY') }}</span>
                                        </div>
                                        <h5 class="card-title mt-2 mb-4">{{ $item->nama_kegiatan }}</h5>
                                        <div class="justify-between">
                                            <div class="icon-text">
                                                <i class="fas fa-clock text-secondary"></i>
                                                <span class="text-secondary">{{ $item->jam_kegiatan }}</span>
                                            </div>
                                            <div class="icon-text">
                                                <i class="fas fa-map-marker-alt text-secondary"></i>
                                                <span class="text-secondary">{{ $item->lokasi_kegiatan }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                    <div class="d-flex justify-content-center">
                        {{ $warta->links() }}
                    </div>
                </div>

            </div>

        </div>

    </div>
    <script>
        function addWartaHash() {
            const currentUrl = window.location.href;
            if (currentUrl.includes("?q") || currentUrl.includes("?d") ) {
                const newUrl = currentUrl + "#warta";
                window.location.href = newUrl;
            }
        }

        function addBeritaHash() {
            const currentUrl = window.location.href;
            if (currentUrl.includes("?t") || currentUrl.includes("?b") ) {
                const newUrl = currentUrl + "#berita";
                window.location.href = newUrl;
            }
        }

        window.addEventListener("load", addWartaHash);
        window.addEventListener("load", addBeritaHash);

    </script>
    <!-- info section -->
    @include('layouts.front.footer')


</body>

</html>
