<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PMS - Marketing, Prescribed for Doctors</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,400;12..96,600;12..96,700;12..96,800&family=Inter:wght@400;500;600;700&family=Caveat:wght@500;600;700&display=swap"
        rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/collapse@3.x.x/dist/cdn.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <style>
        :root {
            --paper: #ffffff;
            /* pure white */
            --paper-2: #F3F9FA;
            /* whisper-light teal for section separation */
            --ink: #13343B;
            /* deep teal-slate text */
            --ink-soft: #5C737A;
            --pen: #0E606E;
            /* teal (primary) */
            --pen-deep: #0A4A55;
            --rx: #FF9700;
            /* orange accent */
            --mint: #E4F2F1;
            /* light teal chip */
            --teal: #0E9488;
            /* verified / success teal */
            --line: #E4EDEE;
            --marker: #FFDE59;
            /* highlighter yellow */
            --violet: #8B5CF6;
            --amber: #F59E0B;
            --sky: #3B82F6;
            --radius: 16px;
            --shadow: 0 10px 30px rgba(19, 52, 59, .08);
            --shadow-lg: 0 24px 60px rgba(19, 52, 59, .13);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box
        }

        [x-cloak] {
            display: none !important
        }

        html {
            scroll-behavior: smooth
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--paper);
            color: var(--ink);
            line-height: 1.6;
            -webkit-font-smoothing: antialiased;
            overflow-x: hidden
        }

        /* Odoo-style: handwritten display headlines, clean sans for card titles */
        h1,
        h2 {
            font-family: 'Caveat', cursive;
            font-weight: 700;
            line-height: 1.02;
            letter-spacing: .5px
        }

        h3 {
            font-family: 'Bricolage Grotesque', sans-serif;
            line-height: 1.15
        }

        .hand {
            font-family: 'Caveat', cursive;
            color: var(--pen)
        }

        a {
            color: inherit;
            text-decoration: none
        }

        img {
            max-width: 100%;
            display: block
        }

        .wrap {
            max-width: 1160px;
            margin: 0 auto;
            padding: 0 24px
        }

        :focus-visible {
            outline: 3px solid var(--pen);
            outline-offset: 3px;
            border-radius: 4px
        }

        /* highlighter marker */
        .hl {
            background: linear-gradient(120deg, rgba(255, 222, 89, 0) 0%, var(--marker) 8%, var(--marker) 92%, rgba(255, 222, 89, 0) 100%);
            padding: 0 4px;
            border-radius: 3px;
            -webkit-box-decoration-break: clone;
            box-decoration-break: clone;
        }

        /* Odoo-style hand-drawn squiggle under section titles */
        .section-head h2::after {
            content: "";
            display: block;
            width: 150px;
            height: 15px;
            margin: 10px 0 0;
            background: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 150 15'%3E%3Cpath d='M3 9 Q 28 2 52 8 T 100 7 T 147 9' fill='none' stroke='%230E606E' stroke-width='4' stroke-linecap='round'/%3E%3C/svg%3E") no-repeat left center/contain;
        }

        .section-head.center h2::after {
            margin-left: auto;
            margin-right: auto
        }

        /* playful tilt on handwritten notes (Odoo vibe) */
        .hand-note {
            display: inline-block;
            transform: rotate(-2deg)
        }

        .montage-txt .hand,
        .pos-txt .hand,
        .register .hand,
        .final .hand,
        .mosaic-sec .hand,
        .stats .hand-lead {
            display: inline-block;
            transform: rotate(-1.5deg)
        }

        .circle-word {
            position: relative;
            white-space: nowrap;
            display: inline-block
        }

        .circle-word svg {
            position: absolute;
            left: -8%;
            top: -14%;
            width: 116%;
            height: 130%;
            pointer-events: none;
            overflow: visible
        }

        .circle-word svg path {
            fill: none;
            stroke: var(--rx);
            stroke-width: 3.4;
            stroke-linecap: round;
            stroke-dasharray: 520;
            stroke-dashoffset: 520
        }

        .circle-word.drawn svg path {
            animation: circle-draw 1s ease forwards
        }

        @keyframes circle-draw {
            to {
                stroke-dashoffset: 0
            }
        }

        /* ---------- buttons ---------- */
        .btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 12px 24px;
            border-radius: 999px;
            font-weight: 600;
            font-size: 15px;
            border: 2px solid var(--pen);
            transition: transform .18s ease, box-shadow .18s ease, background .18s ease;
            cursor: pointer
        }

        .btn-solid {
            background: var(--pen);
            color: #fff
        }

        .btn-solid:hover {
            background: var(--pen-deep);
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(36, 71, 178, .28)
        }

        .btn-ghost {
            background: transparent;
            color: var(--pen)
        }

        .btn-ghost:hover {
            background: var(--pen);
            color: #fff
        }

        .btn-red {
            background: var(--rx);
            border-color: var(--rx);
            color: #fff
        }

        .btn-red:hover {
            background: #B72B39;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(217, 59, 74, .3)
        }

        .btn-lg {
            padding: 15px 30px;
            font-size: 16px
        }

        /* ---------- header (clean) ---------- */
        .header {
            position: sticky;
            top: 0;
            z-index: 50;
            background: #FFF;
            border-bottom: none
        }

        .header .wrap {
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 76px
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 10px
        }

        .logo-img {
            height: 40px;
            width: auto;
            display: block
        }

        .head-right {
            display: flex;
            align-items: center;
            gap: 14px
        }

        .head-login {
            padding: 10px 26px;
            font-size: 14.5px
        }

        /* hamburger icon (3 lines → X) */
        .menu-btn {
            display: block;
            background: none;
            border: none;
            cursor: pointer;
            padding: 8px
        }

        .hb {
            display: flex;
            flex-direction: column;
            gap: 5px;
            width: 26px
        }

        .hb i {
            display: block;
            height: 2.5px;
            border-radius: 2px;
            background: var(--ink);
            transition: transform .3s ease, opacity .3s ease
        }

        .hb.x i:nth-child(1) {
            transform: translateY(7.5px) rotate(45deg)
        }

        .hb.x i:nth-child(2) {
            opacity: 0
        }

        .hb.x i:nth-child(3) {
            transform: translateY(-7.5px) rotate(-45deg)
        }

        /* drawer */
        .drawer-bg {
            position: fixed;
            inset: 0;
            background: rgba(19, 52, 59, .4);
            backdrop-filter: blur(3px);
            z-index: 60
        }

        .drawer {
            position: fixed;
            top: 0;
            right: 0;
            bottom: 0;
            width: min(320px, 85vw);
            z-index: 61;
            background: #fff;
            box-shadow: -20px 0 60px rgba(19, 52, 59, .18);
            display: flex;
            flex-direction: column;
            gap: 4px;
            padding: 90px 32px 32px;
            transform: translateX(100%);
            transition: transform .32s ease;
        }

        .drawer.open {
            transform: translateX(0)
        }

        .drawer a {
            padding: 14px 4px;
            font-family: 'Bricolage Grotesque';
            font-weight: 700;
            font-size: 19px;
            color: var(--ink);
            border-bottom: 1px solid var(--line);
            transition: color .15s, padding-left .15s;
        }

        .drawer a:hover {
            color: var(--pen);
            padding-left: 12px
        }

        .drawer .drawer-cta {
            margin-top: auto;
            border: none;
            background: var(--rx);
            color: #fff;
            text-align: center;
            border-radius: 12px;
            padding: 15px;
            font-size: 16px;
        }

        .drawer .drawer-cta:hover {
            background: #E07B2A;
            color: #fff;
            padding-left: 15px
        }

        /* ---------- sections ---------- */
        .section {
            padding: 80px 0
        }

        .section-head {
            max-width: 660px;
            margin-bottom: 48px
        }

        .section-head.center {
            margin-left: auto;
            margin-right: auto;
            text-align: center
        }

        .section-head h2 {
            font-size: clamp(42px, 5vw, 64px);
            font-weight: 700;
            letter-spacing: 0
        }

        .section-head p {
            margin-top: 14px;
            color: var(--ink-soft);
            font-size: 17px
        }

        .section-head .hand-note {
            font-size: 23px;
            margin-bottom: 6px;
            display: inline-block
        }

        /* ---------- grid callout / price pill ---------- */
        .grid-callout {
            margin-top: 34px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 14px;
            flex-wrap: wrap
        }

        .grid-callout .hand {
            font-size: 22px
        }

        .pill-price {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: var(--mint);
            color: var(--teal);
            font-weight: 700;
            font-size: 15px;
            padding: 10px 20px;
            border-radius: 999px;
            border: 1.5px dashed var(--teal)
        }

        /* ---------- Rx service cards ---------- */
        .services {
            background: var(--mint)
        }

        .svc-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 22px
        }

        .svc {
            background: #fff;
            border: 1px solid var(--line);
            border-radius: var(--radius);
            padding: 26px;
            position: relative;
            transition: transform .2s ease, box-shadow .2s ease
        }

        .svc:hover {
            transform: translateY(-6px);
            box-shadow: var(--shadow)
        }

        .svc .rx-mini {
            font-family: 'Bricolage Grotesque';
            font-weight: 800;
            font-size: 24px;
            color: var(--rx);
            margin-bottom: 14px
        }

        .svc h3 {
            font-size: 19px;
            font-weight: 700;
            margin-bottom: 8px
        }

        .svc p {
            font-size: 14.5px;
            color: var(--ink-soft)
        }

        .svc .dose {
            margin-top: 16px;
            font-family: 'Caveat';
            font-size: 19px;
            color: var(--pen);
            border-top: 1px dashed var(--line);
            padding-top: 12px
        }

        /* ---------- specialties strip ---------- */
        .spec-strip {
            padding: 56px 0;
            background: var(--pen);
            color: #fff
        }

        .spec-strip .wrap {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 16px;
            justify-content: center
        }

        .spec-strip .label {
            font-family: 'Bricolage Grotesque';
            font-weight: 700;
            font-size: 18px;
            margin-right: 8px
        }

        .chip {
            padding: 9px 18px;
            border-radius: 999px;
            border: 1.5px solid rgba(255, 255, 255, .4);
            font-size: 14.5px;
            font-weight: 500
        }

        .chip.hot {
            background: #fff;
            color: var(--pen);
            border-color: #fff;
            font-weight: 700
        }

        /* ---------- practice online montage ---------- */
        .montage-sec {
            background: var(--paper-2)
        }

        .montage-sec .wrap {
            display: grid;
            grid-template-columns: .9fr 1.1fr;
            gap: 56px;
            align-items: center
        }

        .montage {
            position: relative;
            min-height: 440px
        }

        .mock {
            position: absolute;
            background: #fff;
            border: 1px solid var(--line);
            border-radius: 14px;
            box-shadow: var(--shadow-lg)
        }

        .mock-web {
            width: 320px;
            top: 0;
            left: 0;
            transform: rotate(-4deg);
            overflow: hidden
        }

        .mock-web .bar {
            height: 26px;
            background: var(--paper-2);
            display: flex;
            align-items: center;
            gap: 5px;
            padding: 0 10px;
            border-bottom: 1px solid var(--line)
        }

        .mock-web .bar i {
            width: 9px;
            height: 9px;
            border-radius: 50%;
            background: #D9DEE6;
            display: block
        }

        .mock-web .body {
            padding: 14px
        }

        .mock-web .hbar {
            height: 56px;
            border-radius: 8px;
            background: linear-gradient(120deg, var(--pen), var(--violet));
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            padding: 0 12px;
            color: #fff;
            font-family: 'Bricolage Grotesque';
            font-weight: 700;
            font-size: 13px
        }

        .mock-web .row {
            height: 9px;
            border-radius: 5px;
            background: #E9EDF3;
            margin-bottom: 8px
        }

        .mock-web .row.s {
            width: 60%
        }

        .mock-web .cta {
            margin-top: 10px;
            height: 28px;
            width: 110px;
            border-radius: 7px;
            background: var(--rx);
            color: #fff;
            font-size: 11px;
            font-weight: 700;
            display: grid;
            place-items: center
        }

        .mock-wa {
            width: 230px;
            bottom: 8px;
            left: 150px;
            transform: rotate(3deg);
            padding: 14px;
            z-index: 3
        }

        .mock-wa .wtop {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 12px
        }

        .mock-wa .wtop .dot {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background: #25D366;
            display: grid;
            place-items: center;
            color: #fff;
            font-size: 15px
        }

        .mock-wa .wtop b {
            font-size: 13px
        }

        .mock-wa .bub {
            background: #E7F8ec;
            border-radius: 10px 10px 10px 2px;
            padding: 9px 11px;
            font-size: 12px;
            color: #0B3D2E;
            margin-bottom: 7px
        }

        .mock-wa .bub.me {
            background: #DCF8C6;
            border-radius: 10px 10px 2px 10px;
            margin-left: 26px
        }

        .mock-rev {
            width: 210px;
            top: 36px;
            right: 0;
            transform: rotate(4deg);
            padding: 16px;
            z-index: 2
        }

        .mock-rev .g {
            display: flex;
            align-items: center;
            gap: 6px;
            font-weight: 700;
            font-size: 13px;
            margin-bottom: 6px
        }

        .mock-rev .stars {
            color: #F5B301;
            font-size: 15px;
            letter-spacing: 2px;
            margin-bottom: 8px
        }

        .mock-rev .num {
            font-family: 'Bricolage Grotesque';
            font-size: 30px;
            font-weight: 800;
            color: var(--ink)
        }

        .mock-rev small {
            color: var(--ink-soft);
            font-size: 12px
        }

        .mock-ig {
            width: 150px;
            bottom: 60px;
            right: 24px;
            transform: rotate(-5deg);
            overflow: hidden;
            z-index: 1
        }

        .mock-ig .pic {
            height: 110px;
            background: linear-gradient(140deg, var(--rx), var(--amber))
        }

        .mock-ig .cap {
            padding: 9px
        }

        .mock-ig .cap .l {
            color: var(--rx);
            font-size: 14px;
            margin-bottom: 5px
        }

        .mock-ig .cap .row {
            height: 7px;
            border-radius: 4px;
            background: #E9EDF3;
            margin-bottom: 5px
        }

        .mock-ig .cap .row.s {
            width: 55%
        }

        .montage-txt h2 {
            font-size: clamp(40px, 4.6vw, 60px);
            font-weight: 700;
            letter-spacing: 0
        }

        .montage-txt .hand {
            font-size: 22px;
            display: inline-block;
            margin-bottom: 6px
        }

        .feat-list {
            margin-top: 22px;
            display: grid;
            gap: 12px
        }

        .feat-list li {
            list-style: none;
            display: flex;
            gap: 12px;
            align-items: flex-start;
            font-size: 15.5px;
            color: var(--ink-soft)
        }

        .feat-list .tick {
            min-width: 24px;
            height: 24px;
            border-radius: 50%;
            background: var(--mint);
            color: var(--teal);
            display: grid;
            place-items: center;
            font-size: 13px;
            font-weight: 800;
            margin-top: 2px
        }

        /* ---------- stats / results ---------- */
        .stats {
            background: var(--ink);
            color: #fff;
            text-align: center
        }

        .stats .grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 24px
        }

        .stat .n {
            font-family: 'Bricolage Grotesque';
            font-size: clamp(38px, 5vw, 56px);
            font-weight: 800;
            letter-spacing: -.02em
        }

        .stat .n .plus {
            color: var(--rx)
        }

        .stat .l {
            color: #AEBBD0;
            font-size: 14.5px;
            margin-top: 4px
        }

        .stats .hand-lead {
            font-size: 24px;
            color: #8FB0FF;
            margin-bottom: 8px;
            display: inline-block
        }

        .stats h2 {
            font-size: clamp(38px, 4.4vw, 56px);
            font-weight: 700;
            margin-bottom: 44px
        }

        /* ---------- why choose value cards ---------- */
        .why-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px
        }

        .why-card {
            background: #fff;
            border: 1px solid var(--line);
            border-radius: var(--radius);
            padding: 26px;
            transition: transform .2s, box-shadow .2s
        }

        .why-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow)
        }

        .why-card .em {
            width: 46px;
            height: 46px;
            border-radius: 12px;
            display: grid;
            place-items: center;
            font-size: 22px;
            margin-bottom: 14px
        }

        .why-card h3 {
            font-size: 18px;
            font-weight: 700;
            margin-bottom: 8px
        }

        .why-card p {
            font-size: 14.5px;
            color: var(--ink-soft)
        }

        /* ---------- positioning quadrant ---------- */
        .pos-sec {
            background: var(--paper-2)
        }

        .pos-sec .wrap {
            display: grid;
            grid-template-columns: .85fr 1.15fr;
            gap: 48px;
            align-items: center
        }

        .pos-txt .hand {
            font-size: 22px;
            display: inline-block;
            margin-bottom: 6px
        }

        .pos-txt h2 {
            font-size: clamp(40px, 4.6vw, 60px);
            font-weight: 700;
            letter-spacing: 0
        }

        .pos-txt p {
            margin-top: 14px;
            color: var(--ink-soft);
            font-size: 16px
        }

        .quad {
            position: relative;
            background: #fff;
            border: 1px solid var(--line);
            border-radius: 18px;
            box-shadow: var(--shadow);
            aspect-ratio: 1/.92;
            padding: 26px
        }

        .quad .axis-x,
        .quad .axis-y {
            position: absolute;
            background: var(--line)
        }

        .quad .axis-x {
            left: 26px;
            right: 26px;
            top: 50%;
            height: 2px
        }

        .quad .axis-y {
            top: 26px;
            bottom: 26px;
            left: 50%;
            width: 2px
        }

        .quad .lbl {
            position: absolute;
            font-size: 11.5px;
            font-weight: 700;
            letter-spacing: .06em;
            text-transform: uppercase;
            color: var(--ink-soft)
        }

        .quad .lbl.top {
            top: 12px;
            left: 50%;
            transform: translateX(-50%)
        }

        .quad .lbl.bottom {
            bottom: 12px;
            left: 50%;
            transform: translateX(-50%)
        }

        .quad .lbl.left {
            left: 14px;
            top: 50%;
            transform: translateY(-50%) rotate(-90deg);
            transform-origin: left center
        }

        .quad .lbl.right {
            right: 14px;
            top: 50%;
            transform: translateY(-50%) rotate(90deg);
            transform-origin: right center
        }

        .quad .dot {
            position: absolute;
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: var(--ink-soft);
            transform: translate(-50%, -50%)
        }

        .quad .dot span {
            position: absolute;
            left: 16px;
            top: -4px;
            font-size: 12px;
            font-weight: 600;
            color: var(--ink-soft);
            white-space: nowrap
        }

        .quad .us {
            width: 20px;
            height: 20px;
            background: var(--rx);
            box-shadow: 0 0 0 6px rgba(217, 59, 74, .18)
        }

        .quad .us span {
            color: var(--rx);
            font-weight: 800;
            font-family: 'Bricolage Grotesque';
            font-size: 14px
        }

        .quad .us-ring {
            position: absolute;
            width: 74px;
            height: 74px;
            border: 2px dashed var(--rx);
            border-radius: 50%;
            transform: translate(-50%, -50%);
            opacity: .55
        }

        /* ---------- process ---------- */
        .proc-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            counter-reset: step
        }

        .proc {
            position: relative;
            padding: 26px 22px;
            border: 1px solid var(--line);
            border-radius: var(--radius);
            background: #fff
        }

        .proc .n {
            width: 44px;
            height: 44px;
            border-radius: 12px;
            background: var(--pen);
            color: #fff;
            display: grid;
            place-items: center;
            font-family: 'Bricolage Grotesque';
            font-weight: 800;
            font-size: 19px;
            margin-bottom: 16px
        }

        .proc h3 {
            font-size: 17px;
            font-weight: 700;
            margin-bottom: 6px
        }

        .proc p {
            font-size: 14px;
            color: var(--ink-soft)
        }

        /* ---------- doctors directory ---------- */
        .filter-row {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            margin-bottom: 36px
        }

        .filter-btn {
            padding: 10px 20px;
            border-radius: 999px;
            border: 1.5px solid var(--line);
            background: #fff;
            font-size: 14.5px;
            font-weight: 600;
            color: var(--ink-soft);
            cursor: pointer;
            transition: all .15s ease;
            font-family: 'Inter'
        }

        .filter-btn:hover {
            border-color: var(--pen);
            color: var(--pen)
        }

        .filter-btn.active {
            background: var(--pen);
            border-color: var(--pen);
            color: #fff
        }

        .doc-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 22px
        }

        /* clean, light doctor card - no animation */
        .doc-card {
            background: #fff;
            border: 1px solid var(--line);
            border-radius: 16px;
            padding: 24px 22px;
            position: relative;
            transition: box-shadow .2s ease, border-color .2s ease;
        }

        .doc-card:hover {
            box-shadow: var(--shadow);
            border-color: var(--pen)
        }

        .doc-head {
            display: flex;
            align-items: center;
            gap: 14px;
            margin-bottom: 16px
        }

        .doc-av {
            width: 56px;
            height: 56px;
            border-radius: 14px;
            flex-shrink: 0;
            display: grid;
            place-items: center;
            color: #fff;
            font-weight: 800;
            font-size: 20px;
            font-family: 'Bricolage Grotesque';
        }

        .doc-id {
            min-width: 0
        }

        .doc-card h3 {
            font-size: 16px;
            font-weight: 800;
            letter-spacing: -.01em;
            line-height: 1.2
        }

        .doc-card .spec {
            color: var(--pen);
            font-size: 12px;
            font-weight: 700;
            margin-top: 2px
        }

        .doc-verified {
            position: absolute;
            top: 18px;
            right: 18px;
            color: var(--teal);
            font-size: 11px;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 3px;
        }

        .doc-meta {
            display: flex;
            align-items: center;
            gap: 14px;
            font-size: 13px;
            color: var(--ink-soft);
            border-top: 1px solid var(--line);
            padding-top: 14px;
            margin-bottom: 16px;
        }

        .doc-meta .mi {
            display: flex;
            align-items: center;
            gap: 5px
        }

        .doc-meta .mi b {
            color: var(--ink);
            font-weight: 700
        }

        .doc-meta .star {
            color: #FFB100
        }

        .doc-view {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            width: 100%;
            padding: 10px;
            border-radius: 10px;
            font-size: 13.5px;
            font-weight: 700;
            color: var(--pen);
            background: var(--paper-2);
            transition: background .15s ease, color .15s ease;
        }

        .doc-view:hover {
            background: var(--pen);
            color: #fff
        }

        .empty-note {
            grid-column: 1/-1;
            text-align: center;
            color: var(--ink-soft);
            padding: 40px 0;
            font-size: 15px
        }

        /* ---------- testimonials ---------- */
        .testi-sec {
            background: #fff
        }

        .testi-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 22px
        }

        .testi {
            background: var(--paper);
            border: 1px solid var(--line);
            border-radius: var(--radius);
            padding: 26px;
            position: relative
        }

        .testi .q {
            font-family: 'Bricolage Grotesque';
            font-size: 44px;
            color: var(--marker);
            line-height: .6;
            height: 22px
        }

        .testi p {
            font-size: 15px;
            color: var(--ink);
            margin-bottom: 18px
        }

        .testi .who {
            display: flex;
            align-items: center;
            gap: 12px
        }

        .testi .who .av {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            display: grid;
            place-items: center;
            color: #fff;
            font-weight: 700;
            font-size: 14px
        }

        .testi .who .nm {
            font-weight: 700;
            font-size: 14.5px
        }

        .testi .who .cl {
            font-size: 12.5px;
            color: var(--ink-soft)
        }

        .testi .stars {
            color: #F5B301;
            letter-spacing: 2px;
            margin-bottom: 12px;
            font-size: 14px
        }

        /* ---------- doctors mosaic ---------- */
        .mosaic-sec {
            background: var(--pen);
            color: #fff;
            text-align: center;
            position: relative;
            overflow: hidden
        }

        .mosaic {
            display: grid;
            grid-template-columns: repeat(12, 1fr);
            gap: 8px;
            margin-bottom: 40px
        }

        .mtile {
            aspect-ratio: 1;
            border-radius: 9px
        }

        .mtile.ph {
            display: grid;
            place-items: center;
            color: #fff;
            font-weight: 800;
            font-size: 14px;
            font-family: 'Bricolage Grotesque'
        }

        .mosaic-sec h2 {
            font-size: clamp(44px, 5.4vw, 72px);
            font-weight: 700
        }

        .mosaic-sec .hand {
            color: #CFE0FF;
            font-size: 26px;
            display: inline-block;
            margin-bottom: 4px
        }

        .mosaic-sec p {
            color: #CBD6EC;
            font-size: 16px;
            margin-top: 8px
        }

        /* ---------- faq ---------- */
        .faq-sec {
            background: var(--paper-2)
        }

        .faq-wrap {
            max-width: 760px;
            margin: 0 auto
        }

        .faq {
            background: #fff;
            border: 1px solid var(--line);
            border-radius: 12px;
            margin-bottom: 12px;
            overflow: hidden
        }

        .faq button {
            width: 100%;
            text-align: left;
            background: none;
            border: none;
            padding: 20px 22px;
            font-family: 'Bricolage Grotesque';
            font-weight: 700;
            font-size: 16.5px;
            color: var(--ink);
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 16px
        }

        .faq .ic {
            min-width: 26px;
            height: 26px;
            border-radius: 50%;
            background: var(--mint);
            color: var(--teal);
            display: grid;
            place-items: center;
            font-size: 16px;
            transition: transform .2s
        }

        .faq .ans {
            padding: 0 22px;
            color: var(--ink-soft);
            font-size: 15px;
            overflow: hidden
        }

        .faq .ans p {
            padding-bottom: 20px
        }

        /* ---------- register cta ---------- */
        .register {
            background: var(--ink);
            color: #fff;
            position: relative;
            overflow: hidden
        }

        .register .wrap {
            display: grid;
            grid-template-columns: 1.2fr .8fr;
            gap: 48px;
            align-items: center;
            position: relative;
            z-index: 1
        }

        .register h2 {
            font-size: clamp(42px, 5vw, 64px);
            font-weight: 700
        }

        .register p {
            margin: 16px 0 28px;
            color: #B9C4D6;
            font-size: 17px;
            max-width: 480px
        }

        .register .hand {
            color: #8FB0FF;
            font-size: 24px
        }

        .register .steps {
            display: grid;
            gap: 14px
        }

        .register .step {
            background: rgba(255, 255, 255, .06);
            border: 1px solid rgba(255, 255, 255, .12);
            border-radius: 12px;
            padding: 16px 18px;
            display: flex;
            gap: 14px;
            align-items: center
        }

        .register .step .n {
            min-width: 34px;
            height: 34px;
            border-radius: 50%;
            background: var(--rx);
            display: grid;
            place-items: center;
            font-weight: 800;
            font-size: 15px;
            font-family: 'Bricolage Grotesque'
        }

        .register .step p {
            margin: 0;
            font-size: 14.5px;
            color: #DDE4EF
        }

        .register::after {
            content: "℞";
            position: absolute;
            right: -30px;
            bottom: -70px;
            font-family: 'Bricolage Grotesque';
            font-size: 340px;
            font-weight: 800;
            color: rgba(255, 255, 255, .04);
            line-height: 1
        }

        /* ---------- registration form (prescription pad) ---------- */
        .reg-form-sec {
            background: var(--paper-2);
            position: relative;
            overflow: hidden
        }

        .reg-form-sec .spark {
            font-size: 22px
        }

        .reg-pad {
            max-width: 720px;
            margin: 0 auto;
            background: #fff;
            border: 1px solid var(--line);
            border-radius: 18px;
            box-shadow: var(--shadow-lg);
            position: relative;
            overflow: hidden;
        }

        /* torn top edge feel + pen-blue rule */
        .reg-pad .pad-head {
            background: linear-gradient(135deg, var(--pen), var(--pen-deep));
            color: #fff;
            padding: 26px 32px;
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            position: relative;
        }

        .reg-pad .pad-head .rx-big {
            font-family: 'Bricolage Grotesque';
            font-size: 56px;
            font-weight: 800;
            line-height: .8;
            opacity: .9
        }

        .reg-pad .pad-head .ph-title {
            font-family: 'Bricolage Grotesque';
            font-weight: 800;
            font-size: 22px
        }

        .reg-pad .pad-head .ph-title small {
            display: block;
            font-family: 'Inter';
            font-weight: 500;
            font-size: 12.5px;
            color: #C9D4F0;
            margin-top: 4px;
            letter-spacing: .02em
        }

        .reg-pad .pad-body {
            padding: 30px 32px 34px;
            position: relative
        }

        .reg-pad .pad-body::before {
            content: "";
            position: absolute;
            inset: 14px;
            border: 1.5px dashed #D3DCEC;
            border-radius: 12px;
            pointer-events: none;
        }

        .reg-inner {
            position: relative;
            z-index: 1
        }

        .reg-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 18px 20px
        }

        .reg-field {
            display: flex;
            flex-direction: column;
            gap: 6px
        }

        .reg-field.full {
            grid-column: 1/-1
        }

        .reg-field label {
            font-size: 12.5px;
            font-weight: 700;
            color: var(--ink);
            letter-spacing: .02em;
            display: flex;
            align-items: center;
            gap: 6px
        }

        .reg-field label .rq {
            color: var(--rx)
        }

        .reg-field .hint {
            font-family: 'Caveat';
            font-size: 16px;
            color: var(--pen);
            font-weight: 600
        }

        .reg-field input,
        .reg-field select,
        .reg-field textarea {
            font-family: 'Caveat';
            font-size: 18px;
            color: var(--ink);
            padding: 12px 14px;
            border: 1.5px solid var(--line);
            border-radius: 10px;
            background: var(--paper);
            transition: border-color .15s ease, box-shadow .15s ease;
            width: 100%;
        }

        .reg-field textarea {
            resize: vertical;
            min-height: 74px
        }

        .reg-field input:focus,
        .reg-field select:focus,
        .reg-field textarea:focus {
            outline: none;
            border-color: var(--pen);
            box-shadow: 0 0 0 3px rgba(36, 71, 178, .12);
            background: #fff;
        }

        .reg-field.err input,
        .reg-field.err select {
            border-color: var(--rx);
            box-shadow: 0 0 0 3px rgba(217, 59, 74, .1)
        }

        .reg-field .msg {
            font-size: 11.5px;
            color: var(--rx);
            font-weight: 600;
            display: none
        }

        .reg-field.err .msg {
            display: block
        }

        .reg-sub {
            font-family: 'Caveat';
            font-size: 20px;
            color: var(--pen);
            margin: 26px 0 12px;
            display: flex;
            align-items: center;
            gap: 8px
        }

        .reg-sub::before {
            content: "℞";
            font-family: 'Bricolage Grotesque';
            font-weight: 800;
            color: var(--rx);
            font-size: 22px
        }

        .svc-picker {
            display: flex;
            flex-wrap: wrap;
            gap: 10px
        }

        .svc-pick {
            padding: 9px 16px;
            border-radius: 999px;
            border: 1.5px solid var(--line);
            background: var(--paper);
            font-size: 13.5px;
            font-weight: 600;
            color: var(--ink-soft);
            cursor: pointer;
            transition: all .15s ease;
            user-select: none;
            display: inline-flex;
            align-items: center;
            gap: 7px;
        }

        .svc-pick:hover {
            border-color: var(--pen);
            color: var(--pen)
        }

        .svc-pick.on {
            background: var(--pen);
            border-color: var(--pen);
            color: #fff
        }

        .svc-pick .tk {
            width: 15px;
            height: 15px;
            border-radius: 50%;
            border: 1.5px solid currentColor;
            display: grid;
            place-items: center;
            font-size: 9px
        }

        .svc-pick.on .tk {
            background: #fff;
            color: var(--pen);
            border-color: #fff
        }

        .reg-consent {
            display: flex;
            gap: 10px;
            align-items: flex-start;
            margin-top: 22px;
            font-size: 13px;
            color: var(--ink-soft)
        }

        .reg-consent input {
            margin-top: 3px;
            width: 16px;
            height: 16px;
            accent-color: var(--pen)
        }

        .reg-footer {
            margin-top: 24px;
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            gap: 20px;
            flex-wrap: wrap
        }

        .reg-sign {
            text-align: center;
            flex: 1;
            min-width: 180px
        }

        .reg-sign .line {
            border-bottom: 2px solid var(--ink);
            margin-bottom: 6px;
            height: 34px;
            display: flex;
            align-items: flex-end;
            justify-content: center
        }

        .reg-sign .line .sig {
            font-family: 'Caveat';
            font-size: 24px;
            color: var(--pen);
            font-weight: 600;
            padding-bottom: 2px
        }

        .reg-sign small {
            font-size: 11px;
            color: var(--ink-soft);
            letter-spacing: .05em;
            text-transform: uppercase
        }

        .reg-submit {
            white-space: nowrap
        }

        /* success state */
        .reg-success {
            text-align: center;
            padding: 40px 20px
        }

        .reg-success .tick-big {
            width: 72px;
            height: 72px;
            border-radius: 50%;
            background: var(--mint);
            color: var(--teal);
            display: grid;
            place-items: center;
            font-size: 36px;
            margin: 0 auto 18px;
        }

        .reg-success h3 {
            font-family: 'Bricolage Grotesque';
            font-size: 26px;
            font-weight: 800;
            margin-bottom: 8px
        }

        .reg-success p {
            color: var(--ink-soft);
            font-size: 15.5px;
            max-width: 420px;
            margin: 0 auto
        }

        .reg-success .stamp {
            display: inline-block;
            margin-top: 20px;
            border: 2.5px solid var(--rx);
            color: var(--rx);
            font-weight: 800;
            font-size: 13px;
            letter-spacing: .12em;
            text-transform: uppercase;
            padding: 8px 16px;
            border-radius: 8px;
            transform: rotate(-4deg);
        }

        /* ---------- plans / membership (marketplace) ---------- */
        .plans-sec {
            background: var(--paper-2)
        }

        .plans-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 22px;
            align-items: stretch
        }

        .plan {
            background: #fff;
            border: 1px solid var(--line);
            border-radius: 18px;
            padding: 30px 26px;
            display: flex;
            flex-direction: column;
            position: relative;
            transition: box-shadow .2s ease, transform .2s ease;
        }

        .plan:hover {
            box-shadow: var(--shadow);
            transform: translateY(-4px)
        }

        .plan.featured {
            border: 2px solid var(--pen);
            box-shadow: var(--shadow-lg)
        }

        .plan .tag {
            position: absolute;
            top: -13px;
            left: 50%;
            transform: translateX(-50%);
            background: var(--rx);
            color: #fff;
            font-size: 11.5px;
            font-weight: 800;
            letter-spacing: .04em;
            text-transform: uppercase;
            padding: 5px 14px;
            border-radius: 999px;
            white-space: nowrap;
        }

        .plan .pname {
            font-family: 'Bricolage Grotesque';
            font-weight: 800;
            font-size: 20px;
            color: var(--ink)
        }

        .plan .pdesc {
            font-size: 13.5px;
            color: var(--ink-soft);
            margin-top: 4px;
            min-height: 38px
        }

        .plan .price {
            margin: 16px 0 4px;
            display: flex;
            align-items: baseline;
            gap: 4px
        }

        .plan .price .amt {
            font-family: 'Bricolage Grotesque';
            font-weight: 800;
            font-size: 38px;
            color: var(--pen);
            letter-spacing: -.01em
        }

        .plan .price .per {
            font-size: 13.5px;
            color: var(--ink-soft)
        }

        .plan .free {
            font-family: 'Bricolage Grotesque';
            font-weight: 800;
            font-size: 38px;
            color: var(--teal);
            letter-spacing: -.01em
        }

        .plan ul {
            list-style: none;
            margin: 20px 0 24px;
            display: grid;
            gap: 11px
        }

        .plan ul li {
            display: flex;
            gap: 10px;
            align-items: flex-start;
            font-size: 14px;
            color: var(--ink)
        }

        .plan ul li .tk {
            min-width: 20px;
            height: 20px;
            border-radius: 50%;
            background: var(--mint);
            color: var(--teal);
            display: grid;
            place-items: center;
            font-size: 11px;
            font-weight: 800;
            margin-top: 1px
        }

        .plan ul li.off {
            color: var(--ink-soft);
            opacity: .6
        }

        .plan ul li.off .tk {
            background: var(--paper-2);
            color: var(--ink-soft)
        }

        .plan .btn {
            margin-top: auto;
            width: 100%;
            justify-content: center
        }

        .plans-note {
            text-align: center;
            margin-top: 28px;
            font-size: 14px;
            color: var(--ink-soft)
        }

        .plans-note .hand {
            font-size: 19px
        }

        @media (max-width:1000px) {
            .plans-grid {
                grid-template-columns: 1fr;
                max-width: 440px;
                margin: 0 auto
            }
        }

        /* ---------- final cta ---------- */
        .final {
            text-align: center;
            position: relative;
            overflow: hidden;
            background: #fff
        }

        .final .hand {
            font-size: 26px;
            display: inline-block;
            margin-bottom: 6px
        }

        .final h2 {
            font-size: clamp(48px, 6.4vw, 84px);
            font-weight: 700;
            letter-spacing: 0;
            max-width: 820px;
            margin: 0 auto 26px
        }

        .final .cta-row {
            display: flex;
            gap: 14px;
            justify-content: center;
            flex-wrap: wrap
        }

        .final .sub {
            margin-top: 16px;
            color: var(--ink-soft);
            font-size: 14.5px
        }

        .spark {
            position: absolute;
            font-size: 26px;
            color: var(--marker);
            pointer-events: none;
            user-select: none
        }

        .spark.r {
            color: var(--rx)
        }

        .spark.t {
            color: var(--teal)
        }

        /* ---------- footer ---------- */
        .footer {
            padding: 48px 0 36px;
            border-top: 1px solid var(--line);
            background: var(--paper-2)
        }

        .footer .wrap {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 18px
        }

        .footer .small {
            font-size: 13.5px;
            color: var(--ink-soft)
        }

        .footer .links {
            display: flex;
            gap: 22px;
            font-size: 14px;
            color: var(--ink-soft)
        }

        .footer .links a:hover {
            color: var(--pen)
        }

        /* ---------- reveal ---------- */
        .reveal {
            opacity: 0;
            transform: translateY(24px);
            transition: opacity .6s ease, transform .6s ease
        }

        .reveal.in {
            opacity: 1;
            transform: none
        }

        @media (prefers-reduced-motion:reduce) {
            * {
                animation: none !important;
                transition: none !important
            }

            .reveal {
                opacity: 1;
                transform: none
            }

            .circle-word svg path {
                stroke-dashoffset: 0
            }
        }

        /* ---------- responsive ---------- */
        @media (max-width:1000px) {

            .svc-grid,
            .why-grid,
            .testi-grid {
                grid-template-columns: repeat(2, 1fr)
            }

            .doc-grid {
                grid-template-columns: repeat(3, 1fr)
            }

            .proc-grid {
                grid-template-columns: repeat(2, 1fr)
            }

            .montage-sec .wrap,
            .pos-sec .wrap,
            .register .wrap {
                grid-template-columns: 1fr;
                gap: 48px
            }

            .montage {
                max-width: 520px;
                margin: 0 auto;
                min-height: 400px
            }

            .stats .grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 32px 24px
            }

            .mosaic {
                grid-template-columns: repeat(8, 1fr)
            }
        }

        @media (max-width:760px) {
            .doc-grid {
                grid-template-columns: repeat(2, 1fr)
            }

            .section {
                padding: 60px 0
            }

            .hero {
                padding: 52px 0 24px
            }
        }

        @media (max-width:680px) {
            .reg-grid {
                grid-template-columns: 1fr
            }

            .reg-footer {
                flex-direction: column-reverse;
                align-items: stretch
            }

            .reg-submit {
                width: 100%;
                justify-content: center
            }

            .pad-head {
                padding: 22px 22px
            }

            .pad-body {
                padding: 26px 22px 30px
            }
        }

        @media (max-width:480px) {

            .svc-grid,
            .why-grid,
            .testi-grid,
            .doc-grid,
            .proc-grid {
                grid-template-columns: 1fr
            }

            .mosaic {
                grid-template-columns: repeat(6, 1fr)
            }

            .stats .grid {
                grid-template-columns: 1fr 1fr
            }
        }

        /* ============================================================
   ADDON: GLOBAL MICRO-ANIMATIONS
   ============================================================ */

        /* twinkling sparks */
        @keyframes twinkle {

            0%,
            100% {
                opacity: .35;
                transform: scale(.85) rotate(0deg)
            }

            50% {
                opacity: 1;
                transform: scale(1.2) rotate(20deg)
            }
        }

        .spark {
            animation: twinkle 3.2s ease-in-out infinite
        }

        .spark.r {
            animation-delay: .8s
        }

        .spark.t {
            animation-delay: 1.6s
        }

        /* hero primary CTA - soft pulse glow */
        @keyframes pulseGlow {

            0%,
            100% {
                box-shadow: 0 0 0 0 rgba(255, 151, 0, .45)
            }

            50% {
                box-shadow: 0 0 0 12px rgba(255, 151, 0, 0)
            }
        }

        .hero .btn-solid.btn-lg {
            animation: pulseGlow 2.6s ease-out infinite
        }

        /* svc cards - ℞ number slides on hover */
        .svc:hover .rx-mini {
            transform: translateX(6px);
            color: var(--pen)
        }

        .svc .rx-mini {
            transition: transform .25s ease, color .25s ease
        }

        /* mosaic tiles gentle pulse */
        @keyframes mtilePulse {

            0%,
            100% {
                opacity: 1
            }

            50% {
                opacity: .55
            }
        }

        .mtile:not(.ph) {
            animation: mtilePulse 4s ease-in-out infinite
        }

        .mtile:nth-child(odd):not(.ph) {
            animation-delay: 2s
        }

        /* doc cards verified tick pop-in */
        @keyframes icPop {
            50% {
                transform: scale(1.18) rotate(-6deg)
            }
        }

        .doc-card:hover .doc-verified {
            animation: icPop .4s ease
        }

        /* jd arrow nudge (shared) */
        @keyframes jd-nudge {

            0%,
            100% {
                transform: translateX(0)
            }

            50% {
                transform: translateX(6px)
            }
        }

        /* smooth stagger for reveal children */
        .reveal.in {
            transition-delay: .05s
        }

        @media (prefers-reduced-motion:reduce) {

            .spark,
            .hero .btn-solid.btn-lg,
            .mtile {
                animation: none !important
            }
        }

        /* ============================================================
   ADDON v2: ODOO-STYLE HERO + JD CAROUSEL LAYOUT
   ============================================================ */

        /* ---------- hero base (restored) ---------- */
        .hero {
            position: relative;
            overflow: hidden
        }

        .hero-blob {
            position: absolute;
            top: -120px;
            right: -140px;
            width: 620px;
            height: 620px;
            border-radius: 50%;
            background: radial-gradient(circle at 30% 30%, rgba(14, 96, 110, .10), rgba(14, 96, 110, 0) 70%);
            z-index: 0
        }

        .hero .wrap {
            position: relative;
            z-index: 1
        }

        .hero .trust {
            margin-top: 32px;
            display: flex;
            align-items: center;
            gap: 14px;
            color: var(--ink-soft);
            font-size: 14px
        }

        .avatar-stack {
            display: flex
        }

        .avatar-stack .av {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            border: 2.5px solid var(--paper);
            display: grid;
            place-items: center;
            font-size: 12px;
            font-weight: 700;
            color: #fff;
            margin-left: -10px
        }

        .avatar-stack .av:first-child {
            margin-left: 0
        }

        /* ---------- hero (odoo) ---------- */
        .hero-odoo {
            padding: 20px 0 0;
            text-align: center
        }

        .hero-odoo .wrap {
            display: block
        }

        .hero-odoo h1 {
            font-size: clamp(56px, 5vw, 100px);
            line-height: 1.02;
            max-width: 1000px;
            margin: 0 auto
        }

        .hl2 {
            display: inline-block;
            padding: 0 14px;
            border-radius: 10px;
            transform: rotate(-1deg);
            background: linear-gradient(180deg, transparent 14%, #FFC24B 14%, #FFB100 86%, transparent 86%);
        }

        .hero-sub {
            font-family: 'Caveat';
            font-weight: 600;
            font-size: clamp(30px, 4.4vw, 52px);
            margin-top: 6px;
            color: var(--ink)
        }

        .u-wave {
            position: relative;
            padding-bottom: 4px
        }

        .u-wave::after {
            content: "";
            position: absolute;
            left: -2%;
            right: -2%;
            bottom: -8px;
            height: 12px;
            background: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 200 14'%3E%3Cpath d='M4 10 Q 60 2 110 7 T 196 6' fill='none' stroke='%232AA8E0' stroke-width='7' stroke-linecap='round'/%3E%3C/svg%3E") no-repeat center/100% 100%;
        }

        .cta-center {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 14px;
            margin-top: 36px;
            flex-wrap: wrap
        }

        .btn-lite {
            background: var(--paper-2);
            border-color: var(--paper-2);
            color: var(--ink)
        }

        .btn-lite:hover {
            background: var(--mint);
            border-color: var(--mint);
            transform: translateY(-2px)
        }

        .price-scribble {
            display: flex;
            align-items: flex-start;
            margin-left: 8px
        }

        .ps-arrow {
            width: 46px;
            height: 42px;
            flex-shrink: 0;
            margin-top: -12px
        }

        .price-scribble span {
            font-family: 'Caveat';
            font-size: 25px;
            font-weight: 700;
            color: var(--ink);
            line-height: 1.05;
            text-align: left;
            display: inline-block;
            transform: rotate(-8deg);
            margin-top: 18px;
        }

        .hero-odoo .trust {
            justify-content: center;
            margin-top: 36px
        }

        .hero-curve {
            width: 130%;
            margin-left: -15%;
            height: 50px;
            margin-top: 20px;
            background: var(--paper-2);
            border-radius: 50% 50% 0 0 / 100% 100% 0 0;
        }

        /* ---------- JD services layout ---------- */
        .jd-sec {
            background: var(--paper-2);
            padding-top: 24px
        }

        .jd-layout {
            display: grid;
            grid-template-columns: 40fr 60fr;
            gap: 16px;
            align-items: stretch;
            margin-bottom: 32px;
            width: 100vw;
            margin-left: calc(50% - 50vw);
            padding: 0 32px;
        }

        /* carousel */
        .jd-slider {
            position: relative;
            border-radius: 18px;
            overflow: hidden;
            min-height: 290px;
            box-shadow: var(--shadow)
        }

        .jd-slide {
            position: absolute;
            inset: 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 30px 38px;
            color: #fff;
            opacity: 0;
            visibility: hidden;
            transition: opacity .55s ease, visibility .55s;
        }

        .jd-slide.on {
            opacity: 1;
            visibility: visible
        }

        .jd-slide .tagline {
            font-size: 12.5px;
            font-weight: 700;
            letter-spacing: .08em;
            text-transform: uppercase;
            opacity: .85
        }

        .jd-slide h3 {
            font-family: 'Bricolage Grotesque';
            font-size: clamp(24px, 2.6vw, 34px);
            font-weight: 800;
            line-height: 1.12;
            margin: 8px 0 18px
        }

        .sl-btn {
            display: inline-flex;
            background: #fff;
            color: var(--ink);
            font-weight: 700;
            font-size: 14px;
            padding: 11px 22px;
            border-radius: 999px;
            transition: transform .2s
        }

        .sl-btn:hover {
            transform: translateY(-2px)
        }

        .jd-slide .emo {
            font-size: 110px;
            filter: drop-shadow(0 10px 18px rgba(0, 0, 0, .25))
        }

        .jd-prev,
        .jd-next {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            width: 36px;
            height: 36px;
            border-radius: 50%;
            border: none;
            background: rgba(255, 255, 255, .92);
            color: var(--ink);
            font-size: 20px;
            font-weight: 800;
            cursor: pointer;
            z-index: 2;
            display: grid;
            place-items: center;
            font-family: 'Inter';
        }

        .jd-prev {
            left: 12px
        }

        .jd-next {
            right: 12px
        }

        .jd-prev:hover,
        .jd-next:hover {
            background: #fff
        }

        .jd-dots {
            position: absolute;
            bottom: 14px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 7px;
            z-index: 2
        }

        .jd-dots span {
            width: 8px;
            height: 8px;
            border-radius: 99px;
            background: rgba(255, 255, 255, .5);
            cursor: pointer;
            transition: all .25s
        }

        .jd-dots span.on {
            background: #fff;
            width: 22px
        }

        /* right cards */
        .jd-cards {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 12px
        }

        .jd-mini {
            position: relative;
            border-radius: 16px;
            padding: 18px 14px;
            color: #fff;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            min-height: 290px;
            box-shadow: 0 8px 20px rgba(19, 52, 59, .14);
            transition: transform .25s ease, box-shadow .25s ease;
        }

        .jd-mini:hover {
            transform: translateY(-8px);
            box-shadow: 0 18px 40px rgba(19, 52, 59, .24)
        }

        .jd-mini h3 {
            font-family: 'Bricolage Grotesque';
            font-size: 17px;
            font-weight: 800;
            text-transform: uppercase;
            line-height: 1.15
        }

        .jd-mini .sub {
            font-size: 12.5px;
            opacity: .92;
            margin-top: 5px;
            line-height: 1.35
        }

        .jd-mini .big {
            position: absolute;
            right: -10px;
            bottom: 16px;
            font-size: 66px;
            opacity: .95;
            transition: transform .3s ease
        }

        .jd-mini:hover .big {
            transform: scale(1.15) rotate(-6deg)
        }

        .jd-mini .go {
            margin-top: auto;
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: #fff;
            color: var(--ink);
            display: grid;
            place-items: center;
            font-size: 18px;
            font-weight: 800;
            position: relative;
            z-index: 1;
            animation: jd-nudge 2.2s ease-in-out infinite;
        }

        /* responsive */
        @media (max-width:1000px) {
            .jd-layout {
                grid-template-columns: 1fr
            }
        }

        @media (max-width:760px) {
            .jd-layout {
                padding: 0 16px
            }

            .jd-cards {
                grid-template-columns: repeat(2, 1fr)
            }

            .jd-mini {
                min-height: 225px
            }

            .jd-slider {
                min-height: 240px
            }

            .jd-slide {
                padding: 22px 24px
            }

            .jd-slide .emo {
                font-size: 70px
            }

            .price-scribble {
                width: 100%;
                justify-content: center;
                margin-left: 0
            }

            .hero-curve {
                height: 70px;
                margin-top: 40px
            }
        }

        @media (prefers-reduced-motion:reduce) {
            .jd-mini .go {
                animation: none
            }
        }

        @media (max-width:760px) {
            .montage-sec .wrap {
                display: none;
            }

            .montage {
                display: none;
                transform: scale(.32);
                transform-origin: top center;
                min-height: 280px;
                margin-bottom: -90px;
            }
        }

        @media (max-width:480px) {
            .montage {
                display: none;
                transform: scale(.22);
                transform-origin: top center;
                min-height: 230px;
                margin-bottom: -130px;
            }
        }
    </style>


    <style>
        :root {
            --paper: #ffffff;
            /* pure white */
            --paper-2: #F3F9FA;
            /* whisper-light teal for section separation */
            --ink: #13343B;
            /* deep teal-slate text */
            --ink-soft: #5C737A;
            --pen: #0E606E;
            /* teal (primary) */
            --pen-deep: #0A4A55;
            --rx: #FF9700;
            /* orange accent */
            --mint: #E4F2F1;
            /* light teal chip */
            --teal: #0E9488;
            /* verified / success teal */
            --line: #E4EDEE;
            --marker: #FFDE59;
            /* highlighter yellow */
            --violet: #8B5CF6;
            --amber: #F59E0B;
            --sky: #3B82F6;
            --radius: 16px;
            --shadow: 0 10px 30px rgba(19, 52, 59, .08);
            --shadow-lg: 0 24px 60px rgba(19, 52, 59, .13);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box
        }

        [x-cloak] {
            display: none !important
        }

        html {
            scroll-behavior: smooth
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--paper);
            color: var(--ink);
            line-height: 1.6;
            -webkit-font-smoothing: antialiased;
            overflow-x: hidden
        }

        /* Odoo-style: handwritten display headlines, clean sans for card titles */
        h1,
        h2 {
            font-family: 'Caveat', cursive;
            font-weight: 700;
            line-height: 1.02;
            letter-spacing: .5px
        }

        h3 {
            font-family: 'Bricolage Grotesque', sans-serif;
            line-height: 1.15
        }

        .hand {
            font-family: 'Caveat', cursive;
            color: var(--pen)
        }

        a {
            color: inherit;
            text-decoration: none
        }

        img {
            max-width: 100%;
            display: block
        }

        .wrap {
            max-width: 1160px;
            margin: 0 auto;
            padding: 0 24px
        }

        :focus-visible {
            outline: 3px solid var(--pen);
            outline-offset: 3px;
            border-radius: 4px
        }

        /* highlighter marker */
        .hl {
            background: linear-gradient(120deg, rgba(255, 222, 89, 0) 0%, var(--marker) 8%, var(--marker) 92%, rgba(255, 222, 89, 0) 100%);
            padding: 0 4px;
            border-radius: 3px;
            -webkit-box-decoration-break: clone;
            box-decoration-break: clone;
        }

        /* Odoo-style hand-drawn squiggle under section titles */
        .section-head h2::after {
            content: "";
            display: block;
            width: 150px;
            height: 15px;
            margin: 10px 0 0;
            background: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 150 15'%3E%3Cpath d='M3 9 Q 28 2 52 8 T 100 7 T 147 9' fill='none' stroke='%230E606E' stroke-width='4' stroke-linecap='round'/%3E%3C/svg%3E") no-repeat left center/contain;
        }

        .section-head.center h2::after {
            margin-left: auto;
            margin-right: auto
        }

        /* playful tilt on handwritten notes (Odoo vibe) */
        .hand-note {
            display: inline-block;
            transform: rotate(-2deg)
        }

        .montage-txt .hand,
        .pos-txt .hand,
        .register .hand,
        .final .hand,
        .mosaic-sec .hand,
        .stats .hand-lead {
            display: inline-block;
            transform: rotate(-1.5deg)
        }

        .circle-word {
            position: relative;
            white-space: nowrap;
            display: inline-block
        }

        .circle-word svg {
            position: absolute;
            left: -8%;
            top: -14%;
            width: 116%;
            height: 130%;
            pointer-events: none;
            overflow: visible
        }

        .circle-word svg path {
            fill: none;
            stroke: var(--rx);
            stroke-width: 3.4;
            stroke-linecap: round;
            stroke-dasharray: 520;
            stroke-dashoffset: 520
        }

        .circle-word.drawn svg path {
            animation: circle-draw 1s ease forwards
        }

        @keyframes circle-draw {
            to {
                stroke-dashoffset: 0
            }
        }

        /* ---------- buttons ---------- */
        .btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 12px 24px;
            border-radius: 999px;
            font-weight: 600;
            font-size: 15px;
            border: 2px solid var(--pen);
            transition: transform .18s ease, box-shadow .18s ease, background .18s ease;
            cursor: pointer
        }

        .btn-solid {
            background: var(--pen);
            color: #fff
        }

        .btn-solid:hover {
            background: var(--pen-deep);
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(36, 71, 178, .28)
        }

        .btn-ghost {
            background: transparent;
            color: var(--pen)
        }

        .btn-ghost:hover {
            background: var(--pen);
            color: #fff
        }

        .btn-red {
            background: var(--rx);
            border-color: var(--rx);
            color: #fff
        }

        .btn-red:hover {
            background: #B72B39;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(217, 59, 74, .3)
        }

        .btn-lg {
            padding: 15px 30px;
            font-size: 16px
        }

        /* ---------- header (clean) ---------- */
        .header {
            position: sticky;
            top: 0;
            z-index: 50;
            background: #FFF;
            border-bottom: none
        }

        .header .wrap {
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 76px
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 10px
        }

        .logo-img {
            height: 40px;
            width: auto;
            display: block
        }

        .head-right {
            display: flex;
            align-items: center;
            gap: 14px
        }

        .head-login {
            padding: 10px 26px;
            font-size: 14.5px
        }

        /* hamburger icon (3 lines → X) */
        .menu-btn {
            display: block;
            background: none;
            border: none;
            cursor: pointer;
            padding: 8px
        }

        .hb {
            display: flex;
            flex-direction: column;
            gap: 5px;
            width: 26px
        }

        .hb i {
            display: block;
            height: 2.5px;
            border-radius: 2px;
            background: var(--ink);
            transition: transform .3s ease, opacity .3s ease
        }

        .hb.x i:nth-child(1) {
            transform: translateY(7.5px) rotate(45deg)
        }

        .hb.x i:nth-child(2) {
            opacity: 0
        }

        .hb.x i:nth-child(3) {
            transform: translateY(-7.5px) rotate(-45deg)
        }

        /* drawer */
        .drawer-bg {
            position: fixed;
            inset: 0;
            background: rgba(19, 52, 59, .4);
            backdrop-filter: blur(3px);
            z-index: 60
        }

        .drawer {
            position: fixed;
            top: 0;
            right: 0;
            bottom: 0;
            width: min(320px, 85vw);
            z-index: 61;
            background: #fff;
            box-shadow: -20px 0 60px rgba(19, 52, 59, .18);
            display: flex;
            flex-direction: column;
            gap: 4px;
            padding: 90px 32px 32px;
            transform: translateX(100%);
            transition: transform .32s ease;
        }

        .drawer.open {
            transform: translateX(0)
        }

        .drawer a {
            padding: 14px 4px;
            font-family: 'Bricolage Grotesque';
            font-weight: 700;
            font-size: 19px;
            color: var(--ink);
            border-bottom: 1px solid var(--line);
            transition: color .15s, padding-left .15s;
        }

        .drawer a:hover {
            color: var(--pen);
            padding-left: 12px
        }

        .drawer .drawer-cta {
            margin-top: auto;
            border: none;
            background: var(--rx);
            color: #fff;
            text-align: center;
            border-radius: 12px;
            padding: 15px;
            font-size: 16px;
        }

        .drawer .drawer-cta:hover {
            background: #E07B2A;
            color: #fff;
            padding-left: 15px
        }

        /* ---------- sections ---------- */
        .section {
            padding: 80px 0
        }

        .section-head {
            max-width: 660px;
            margin-bottom: 48px
        }

        .section-head.center {
            margin-left: auto;
            margin-right: auto;
            text-align: center
        }

        .section-head h2 {
            font-size: clamp(42px, 5vw, 64px);
            font-weight: 700;
            letter-spacing: 0
        }

        .section-head p {
            margin-top: 14px;
            color: var(--ink-soft);
            font-size: 17px
        }

        .section-head .hand-note {
            font-size: 23px;
            margin-bottom: 6px;
            display: inline-block
        }

        /* ---------- grid callout / price pill ---------- */
        .grid-callout {
            margin-top: 34px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 14px;
            flex-wrap: wrap
        }

        .grid-callout .hand {
            font-size: 22px
        }

        .pill-price {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: var(--mint);
            color: var(--teal);
            font-weight: 700;
            font-size: 15px;
            padding: 10px 20px;
            border-radius: 999px;
            border: 1.5px dashed var(--teal)
        }

        /* ---------- Rx service cards ---------- */
        .services {
            background: var(--mint)
        }

        .svc-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 22px
        }

        .svc {
            background: #fff;
            border: 1px solid var(--line);
            border-radius: var(--radius);
            padding: 26px;
            position: relative;
            transition: transform .2s ease, box-shadow .2s ease
        }

        .svc:hover {
            transform: translateY(-6px);
            box-shadow: var(--shadow)
        }

        .svc .rx-mini {
            font-family: 'Bricolage Grotesque';
            font-weight: 800;
            font-size: 24px;
            color: var(--rx);
            margin-bottom: 14px
        }

        .svc h3 {
            font-size: 19px;
            font-weight: 700;
            margin-bottom: 8px
        }

        .svc p {
            font-size: 14.5px;
            color: var(--ink-soft)
        }

        .svc .dose {
            margin-top: 16px;
            font-family: 'Caveat';
            font-size: 19px;
            color: var(--pen);
            border-top: 1px dashed var(--line);
            padding-top: 12px
        }

        /* ---------- specialties strip ---------- */
        .spec-strip {
            padding: 56px 0;
            background: var(--pen);
            color: #fff
        }

        .spec-strip .wrap {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 16px;
            justify-content: center
        }

        .spec-strip .label {
            font-family: 'Bricolage Grotesque';
            font-weight: 700;
            font-size: 18px;
            margin-right: 8px
        }

        .chip {
            padding: 9px 18px;
            border-radius: 999px;
            border: 1.5px solid rgba(255, 255, 255, .4);
            font-size: 14.5px;
            font-weight: 500
        }

        .chip.hot {
            background: #fff;
            color: var(--pen);
            border-color: #fff;
            font-weight: 700
        }

        /* ---------- practice online montage ---------- */
        .montage-sec {
            background: var(--paper-2)
        }

        .montage-sec .wrap {
            display: grid;
            grid-template-columns: .9fr 1.1fr;
            gap: 56px;
            align-items: center
        }

        .montage {
            position: relative;
            min-height: 440px
        }

        .mock {
            position: absolute;
            background: #fff;
            border: 1px solid var(--line);
            border-radius: 14px;
            box-shadow: var(--shadow-lg)
        }

        .mock-web {
            width: 320px;
            top: 0;
            left: 0;
            transform: rotate(-4deg);
            overflow: hidden
        }

        .mock-web .bar {
            height: 26px;
            background: var(--paper-2);
            display: flex;
            align-items: center;
            gap: 5px;
            padding: 0 10px;
            border-bottom: 1px solid var(--line)
        }

        .mock-web .bar i {
            width: 9px;
            height: 9px;
            border-radius: 50%;
            background: #D9DEE6;
            display: block
        }

        .mock-web .body {
            padding: 14px
        }

        .mock-web .hbar {
            height: 56px;
            border-radius: 8px;
            background: linear-gradient(120deg, var(--pen), var(--violet));
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            padding: 0 12px;
            color: #fff;
            font-family: 'Bricolage Grotesque';
            font-weight: 700;
            font-size: 13px
        }

        .mock-web .row {
            height: 9px;
            border-radius: 5px;
            background: #E9EDF3;
            margin-bottom: 8px
        }

        .mock-web .row.s {
            width: 60%
        }

        .mock-web .cta {
            margin-top: 10px;
            height: 28px;
            width: 110px;
            border-radius: 7px;
            background: var(--rx);
            color: #fff;
            font-size: 11px;
            font-weight: 700;
            display: grid;
            place-items: center
        }

        .mock-wa {
            width: 230px;
            bottom: 8px;
            left: 150px;
            transform: rotate(3deg);
            padding: 14px;
            z-index: 3
        }

        .mock-wa .wtop {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 12px
        }

        .mock-wa .wtop .dot {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background: #25D366;
            display: grid;
            place-items: center;
            color: #fff;
            font-size: 15px
        }

        .mock-wa .wtop b {
            font-size: 13px
        }

        .mock-wa .bub {
            background: #E7F8ec;
            border-radius: 10px 10px 10px 2px;
            padding: 9px 11px;
            font-size: 12px;
            color: #0B3D2E;
            margin-bottom: 7px
        }

        .mock-wa .bub.me {
            background: #DCF8C6;
            border-radius: 10px 10px 2px 10px;
            margin-left: 26px
        }

        .mock-rev {
            width: 210px;
            top: 36px;
            right: 0;
            transform: rotate(4deg);
            padding: 16px;
            z-index: 2
        }

        .mock-rev .g {
            display: flex;
            align-items: center;
            gap: 6px;
            font-weight: 700;
            font-size: 13px;
            margin-bottom: 6px
        }

        .mock-rev .stars {
            color: #F5B301;
            font-size: 15px;
            letter-spacing: 2px;
            margin-bottom: 8px
        }

        .mock-rev .num {
            font-family: 'Bricolage Grotesque';
            font-size: 30px;
            font-weight: 800;
            color: var(--ink)
        }

        .mock-rev small {
            color: var(--ink-soft);
            font-size: 12px
        }

        .mock-ig {
            width: 150px;
            bottom: 60px;
            right: 24px;
            transform: rotate(-5deg);
            overflow: hidden;
            z-index: 1
        }

        .mock-ig .pic {
            height: 110px;
            background: linear-gradient(140deg, var(--rx), var(--amber))
        }

        .mock-ig .cap {
            padding: 9px
        }

        .mock-ig .cap .l {
            color: var(--rx);
            font-size: 14px;
            margin-bottom: 5px
        }

        .mock-ig .cap .row {
            height: 7px;
            border-radius: 4px;
            background: #E9EDF3;
            margin-bottom: 5px
        }

        .mock-ig .cap .row.s {
            width: 55%
        }

        .montage-txt h2 {
            font-size: clamp(40px, 4.6vw, 60px);
            font-weight: 700;
            letter-spacing: 0
        }

        .montage-txt .hand {
            font-size: 22px;
            display: inline-block;
            margin-bottom: 6px
        }

        .feat-list {
            margin-top: 22px;
            display: grid;
            gap: 12px
        }

        .feat-list li {
            list-style: none;
            display: flex;
            gap: 12px;
            align-items: flex-start;
            font-size: 15.5px;
            color: var(--ink-soft)
        }

        .feat-list .tick {
            min-width: 24px;
            height: 24px;
            border-radius: 50%;
            background: var(--mint);
            color: var(--teal);
            display: grid;
            place-items: center;
            font-size: 13px;
            font-weight: 800;
            margin-top: 2px
        }

        /* ---------- stats / results ---------- */
        .stats {
            background: var(--ink);
            color: #fff;
            text-align: center
        }

        .stats .grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 24px
        }

        .stat .n {
            font-family: 'Bricolage Grotesque';
            font-size: clamp(38px, 5vw, 56px);
            font-weight: 800;
            letter-spacing: -.02em
        }

        .stat .n .plus {
            color: var(--rx)
        }

        .stat .l {
            color: #AEBBD0;
            font-size: 14.5px;
            margin-top: 4px
        }

        .stats .hand-lead {
            font-size: 24px;
            color: #8FB0FF;
            margin-bottom: 8px;
            display: inline-block
        }

        .stats h2 {
            font-size: clamp(38px, 4.4vw, 56px);
            font-weight: 700;
            margin-bottom: 44px
        }

        /* ---------- why choose value cards ---------- */
        .why-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px
        }

        .why-card {
            background: #fff;
            border: 1px solid var(--line);
            border-radius: var(--radius);
            padding: 26px;
            transition: transform .2s, box-shadow .2s
        }

        .why-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow)
        }

        .why-card .em {
            width: 46px;
            height: 46px;
            border-radius: 12px;
            display: grid;
            place-items: center;
            font-size: 22px;
            margin-bottom: 14px
        }

        .why-card h3 {
            font-size: 18px;
            font-weight: 700;
            margin-bottom: 8px
        }

        .why-card p {
            font-size: 14.5px;
            color: var(--ink-soft)
        }

        /* ---------- positioning quadrant ---------- */
        .pos-sec {
            background: var(--paper-2)
        }

        .pos-sec .wrap {
            display: grid;
            grid-template-columns: .85fr 1.15fr;
            gap: 48px;
            align-items: center
        }

        .pos-txt .hand {
            font-size: 22px;
            display: inline-block;
            margin-bottom: 6px
        }

        .pos-txt h2 {
            font-size: clamp(40px, 4.6vw, 60px);
            font-weight: 700;
            letter-spacing: 0
        }

        .pos-txt p {
            margin-top: 14px;
            color: var(--ink-soft);
            font-size: 16px
        }

        .quad {
            position: relative;
            background: #fff;
            border: 1px solid var(--line);
            border-radius: 18px;
            box-shadow: var(--shadow);
            aspect-ratio: 1/.92;
            padding: 26px
        }

        .quad .axis-x,
        .quad .axis-y {
            position: absolute;
            background: var(--line)
        }

        .quad .axis-x {
            left: 26px;
            right: 26px;
            top: 50%;
            height: 2px
        }

        .quad .axis-y {
            top: 26px;
            bottom: 26px;
            left: 50%;
            width: 2px
        }

        .quad .lbl {
            position: absolute;
            font-size: 11.5px;
            font-weight: 700;
            letter-spacing: .06em;
            text-transform: uppercase;
            color: var(--ink-soft)
        }

        .quad .lbl.top {
            top: 12px;
            left: 50%;
            transform: translateX(-50%)
        }

        .quad .lbl.bottom {
            bottom: 12px;
            left: 50%;
            transform: translateX(-50%)
        }

        .quad .lbl.left {
            left: 14px;
            top: 50%;
            transform: translateY(-50%) rotate(-90deg);
            transform-origin: left center
        }

        .quad .lbl.right {
            right: 14px;
            top: 50%;
            transform: translateY(-50%) rotate(90deg);
            transform-origin: right center
        }

        .quad .dot {
            position: absolute;
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: var(--ink-soft);
            transform: translate(-50%, -50%)
        }

        .quad .dot span {
            position: absolute;
            left: 16px;
            top: -4px;
            font-size: 12px;
            font-weight: 600;
            color: var(--ink-soft);
            white-space: nowrap
        }

        .quad .us {
            width: 20px;
            height: 20px;
            background: var(--rx);
            box-shadow: 0 0 0 6px rgba(217, 59, 74, .18)
        }

        .quad .us span {
            color: var(--rx);
            font-weight: 800;
            font-family: 'Bricolage Grotesque';
            font-size: 14px
        }

        .quad .us-ring {
            position: absolute;
            width: 74px;
            height: 74px;
            border: 2px dashed var(--rx);
            border-radius: 50%;
            transform: translate(-50%, -50%);
            opacity: .55
        }

        /* ---------- process ---------- */
        .proc-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            counter-reset: step
        }

        .proc {
            position: relative;
            padding: 26px 22px;
            border: 1px solid var(--line);
            border-radius: var(--radius);
            background: #fff
        }

        .proc .n {
            width: 44px;
            height: 44px;
            border-radius: 12px;
            background: var(--pen);
            color: #fff;
            display: grid;
            place-items: center;
            font-family: 'Bricolage Grotesque';
            font-weight: 800;
            font-size: 19px;
            margin-bottom: 16px
        }

        .proc h3 {
            font-size: 17px;
            font-weight: 700;
            margin-bottom: 6px
        }

        .proc p {
            font-size: 14px;
            color: var(--ink-soft)
        }

        /* ---------- doctors directory ---------- */
        .filter-row {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            margin-bottom: 36px
        }

        .filter-btn {
            padding: 10px 20px;
            border-radius: 999px;
            border: 1.5px solid var(--line);
            background: #fff;
            font-size: 14.5px;
            font-weight: 600;
            color: var(--ink-soft);
            cursor: pointer;
            transition: all .15s ease;
            font-family: 'Inter'
        }

        .filter-btn:hover {
            border-color: var(--pen);
            color: var(--pen)
        }

        .filter-btn.active {
            background: var(--pen);
            border-color: var(--pen);
            color: #fff
        }

        .doc-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 22px
        }

        /* clean, light doctor card - no animation */
        .doc-card {
            background: #fff;
            border: 1px solid var(--line);
            border-radius: 16px;
            padding: 24px 22px;
            position: relative;
            transition: box-shadow .2s ease, border-color .2s ease;
        }

        .doc-card:hover {
            box-shadow: var(--shadow);
            border-color: var(--pen)
        }

        .doc-head {
            display: flex;
            align-items: center;
            gap: 14px;
            margin-bottom: 16px
        }

        .doc-av {
            width: 56px;
            height: 56px;
            border-radius: 14px;
            flex-shrink: 0;
            display: grid;
            place-items: center;
            color: #fff;
            font-weight: 800;
            font-size: 20px;
            font-family: 'Bricolage Grotesque';
        }

        .doc-id {
            min-width: 0
        }

        .doc-card h3 {
            font-size: 16px;
            font-weight: 800;
            letter-spacing: -.01em;
            line-height: 1.2
        }

        .doc-card .spec {
            color: var(--pen);
            font-size: 12px;
            font-weight: 700;
            margin-top: 2px
        }

        .doc-verified {
            position: absolute;
            top: 18px;
            right: 18px;
            color: var(--teal);
            font-size: 11px;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 3px;
        }

        .doc-meta {
            display: flex;
            align-items: center;
            gap: 14px;
            font-size: 13px;
            color: var(--ink-soft);
            border-top: 1px solid var(--line);
            padding-top: 14px;
            margin-bottom: 16px;
        }

        .doc-meta .mi {
            display: flex;
            align-items: center;
            gap: 5px
        }

        .doc-meta .mi b {
            color: var(--ink);
            font-weight: 700
        }

        .doc-meta .star {
            color: #FFB100
        }

        .doc-view {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            width: 100%;
            padding: 10px;
            border-radius: 10px;
            font-size: 13.5px;
            font-weight: 700;
            color: var(--pen);
            background: var(--paper-2);
            transition: background .15s ease, color .15s ease;
        }

        .doc-view:hover {
            background: var(--pen);
            color: #fff
        }

        .empty-note {
            grid-column: 1/-1;
            text-align: center;
            color: var(--ink-soft);
            padding: 40px 0;
            font-size: 15px
        }

        /* ---------- testimonials ---------- */
        .testi-sec {
            background: #fff
        }

        .testi-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 22px
        }

        .testi {
            background: var(--paper);
            border: 1px solid var(--line);
            border-radius: var(--radius);
            padding: 26px;
            position: relative
        }

        .testi .q {
            font-family: 'Bricolage Grotesque';
            font-size: 44px;
            color: var(--marker);
            line-height: .6;
            height: 22px
        }

        .testi p {
            font-size: 15px;
            color: var(--ink);
            margin-bottom: 18px
        }

        .testi .who {
            display: flex;
            align-items: center;
            gap: 12px
        }

        .testi .who .av {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            display: grid;
            place-items: center;
            color: #fff;
            font-weight: 700;
            font-size: 14px
        }

        .testi .who .nm {
            font-weight: 700;
            font-size: 14.5px
        }

        .testi .who .cl {
            font-size: 12.5px;
            color: var(--ink-soft)
        }

        .testi .stars {
            color: #F5B301;
            letter-spacing: 2px;
            margin-bottom: 12px;
            font-size: 14px
        }

        /* ---------- doctors mosaic ---------- */
        .mosaic-sec {
            background: var(--pen);
            color: #fff;
            text-align: center;
            position: relative;
            overflow: hidden
        }

        .mosaic {
            display: grid;
            grid-template-columns: repeat(12, 1fr);
            gap: 8px;
            margin-bottom: 40px
        }

        .mtile {
            aspect-ratio: 1;
            border-radius: 9px
        }

        .mtile.ph {
            display: grid;
            place-items: center;
            color: #fff;
            font-weight: 800;
            font-size: 14px;
            font-family: 'Bricolage Grotesque'
        }

        .mosaic-sec h2 {
            font-size: clamp(44px, 5.4vw, 72px);
            font-weight: 700
        }

        .mosaic-sec .hand {
            color: #CFE0FF;
            font-size: 26px;
            display: inline-block;
            margin-bottom: 4px
        }

        .mosaic-sec p {
            color: #CBD6EC;
            font-size: 16px;
            margin-top: 8px
        }

        /* ---------- faq ---------- */
        .faq-sec {
            background: var(--paper-2)
        }

        .faq-wrap {
            max-width: 760px;
            margin: 0 auto
        }

        .faq {
            background: #fff;
            border: 1px solid var(--line);
            border-radius: 12px;
            margin-bottom: 12px;
            overflow: hidden
        }

        .faq button {
            width: 100%;
            text-align: left;
            background: none;
            border: none;
            padding: 20px 22px;
            font-family: 'Bricolage Grotesque';
            font-weight: 700;
            font-size: 16.5px;
            color: var(--ink);
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 16px
        }

        .faq .ic {
            min-width: 26px;
            height: 26px;
            border-radius: 50%;
            background: var(--mint);
            color: var(--teal);
            display: grid;
            place-items: center;
            font-size: 16px;
            transition: transform .2s
        }

        .faq .ans {
            padding: 0 22px;
            color: var(--ink-soft);
            font-size: 15px;
            overflow: hidden
        }

        .faq .ans p {
            padding-bottom: 20px
        }

        /* ---------- register cta ---------- */
        .register {
            background: var(--ink);
            color: #fff;
            position: relative;
            overflow: hidden
        }

        .register .wrap {
            display: grid;
            grid-template-columns: 1.2fr .8fr;
            gap: 48px;
            align-items: center;
            position: relative;
            z-index: 1
        }

        .register h2 {
            font-size: clamp(42px, 5vw, 64px);
            font-weight: 700
        }

        .register p {
            margin: 16px 0 28px;
            color: #B9C4D6;
            font-size: 17px;
            max-width: 480px
        }

        .register .hand {
            color: #8FB0FF;
            font-size: 24px
        }

        .register .steps {
            display: grid;
            gap: 14px
        }

        .register .step {
            background: rgba(255, 255, 255, .06);
            border: 1px solid rgba(255, 255, 255, .12);
            border-radius: 12px;
            padding: 16px 18px;
            display: flex;
            gap: 14px;
            align-items: center
        }

        .register .step .n {
            min-width: 34px;
            height: 34px;
            border-radius: 50%;
            background: var(--rx);
            display: grid;
            place-items: center;
            font-weight: 800;
            font-size: 15px;
            font-family: 'Bricolage Grotesque'
        }

        .register .step p {
            margin: 0;
            font-size: 14.5px;
            color: #DDE4EF
        }

        .register::after {
            content: "℞";
            position: absolute;
            right: -30px;
            bottom: -70px;
            font-family: 'Bricolage Grotesque';
            font-size: 340px;
            font-weight: 800;
            color: rgba(255, 255, 255, .04);
            line-height: 1
        }

        /* ---------- registration form (prescription pad) ---------- */
        .reg-form-sec {
            background: var(--paper-2);
            position: relative;
            overflow: hidden
        }

        .reg-form-sec .spark {
            font-size: 22px
        }

        .reg-pad {
            max-width: 720px;
            margin: 0 auto;
            background: #fff;
            border: 1px solid var(--line);
            border-radius: 18px;
            box-shadow: var(--shadow-lg);
            position: relative;
            overflow: hidden;
        }

        /* torn top edge feel + pen-blue rule */
        .reg-pad .pad-head {
            background: linear-gradient(135deg, var(--pen), var(--pen-deep));
            color: #fff;
            padding: 26px 32px;
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            position: relative;
        }

        .reg-pad .pad-head .rx-big {
            font-family: 'Bricolage Grotesque';
            font-size: 56px;
            font-weight: 800;
            line-height: .8;
            opacity: .9
        }

        .reg-pad .pad-head .ph-title {
            font-family: 'Bricolage Grotesque';
            font-weight: 800;
            font-size: 22px
        }

        .reg-pad .pad-head .ph-title small {
            display: block;
            font-family: 'Inter';
            font-weight: 500;
            font-size: 12.5px;
            color: #C9D4F0;
            margin-top: 4px;
            letter-spacing: .02em
        }

        .reg-pad .pad-body {
            padding: 30px 32px 34px;
            position: relative
        }

        .reg-pad .pad-body::before {
            content: "";
            position: absolute;
            inset: 14px;
            border: 1.5px dashed #D3DCEC;
            border-radius: 12px;
            pointer-events: none;
        }

        .reg-inner {
            position: relative;
            z-index: 1
        }

        .reg-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 18px 20px
        }

        .reg-field {
            display: flex;
            flex-direction: column;
            gap: 6px
        }

        .reg-field.full {
            grid-column: 1/-1
        }

        .reg-field label {
            font-size: 12.5px;
            font-weight: 700;
            color: var(--ink);
            letter-spacing: .02em;
            display: flex;
            align-items: center;
            gap: 6px
        }

        .reg-field label .rq {
            color: var(--rx)
        }

        .reg-field .hint {
            font-family: 'Caveat';
            font-size: 16px;
            color: var(--pen);
            font-weight: 600
        }

        .reg-field input,
        .reg-field select,
        .reg-field textarea {
            font-family: 'Inter';
            font-size: 15px;
            color: var(--ink);
            padding: 12px 14px;
            border: 1.5px solid var(--line);
            border-radius: 10px;
            background: var(--paper);
            transition: border-color .15s ease, box-shadow .15s ease;
            width: 100%;
        }

        .reg-field textarea {
            resize: vertical;
            min-height: 74px
        }

        .reg-field input:focus,
        .reg-field select:focus,
        .reg-field textarea:focus {
            outline: none;
            border-color: var(--pen);
            box-shadow: 0 0 0 3px rgba(36, 71, 178, .12);
            background: #fff;
        }

        .reg-field.err input,
        .reg-field.err select {
            border-color: var(--rx);
            box-shadow: 0 0 0 3px rgba(217, 59, 74, .1)
        }

        .reg-field .msg {
            font-size: 11.5px;
            color: var(--rx);
            font-weight: 600;
            display: none
        }

        .reg-field.err .msg {
            display: block
        }

        .reg-sub {
            font-family: 'Caveat';
            font-size: 20px;
            color: var(--pen);
            margin: 26px 0 12px;
            display: flex;
            align-items: center;
            gap: 8px
        }

        .reg-sub::before {
            content: "℞";
            font-family: 'Bricolage Grotesque';
            font-weight: 800;
            color: var(--rx);
            font-size: 22px
        }

        .svc-picker {
            display: flex;
            flex-wrap: wrap;
            gap: 10px
        }

        .svc-pick {
            padding: 9px 16px;
            border-radius: 999px;
            border: 1.5px solid var(--line);
            background: var(--paper);
            font-size: 13.5px;
            font-weight: 600;
            color: var(--ink-soft);
            cursor: pointer;
            transition: all .15s ease;
            user-select: none;
            display: inline-flex;
            align-items: center;
            gap: 7px;
        }

        .svc-pick:hover {
            border-color: var(--pen);
            color: var(--pen)
        }

        .svc-pick.on {
            background: var(--pen);
            border-color: var(--pen);
            color: #fff
        }

        .svc-pick .tk {
            width: 15px;
            height: 15px;
            border-radius: 50%;
            border: 1.5px solid currentColor;
            display: grid;
            place-items: center;
            font-size: 9px
        }

        .svc-pick.on .tk {
            background: #fff;
            color: var(--pen);
            border-color: #fff
        }

        .reg-consent {
            display: flex;
            gap: 10px;
            align-items: flex-start;
            margin-top: 22px;
            font-size: 13px;
            color: var(--ink-soft)
        }

        .reg-consent input {
            margin-top: 3px;
            width: 16px;
            height: 16px;
            accent-color: var(--pen)
        }

        .reg-footer {
            margin-top: 24px;
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            gap: 20px;
            flex-wrap: wrap
        }

        .reg-sign {
            text-align: center;
            flex: 1;
            min-width: 180px
        }

        .reg-sign .line {
            border-bottom: 2px solid var(--ink);
            margin-bottom: 6px;
            height: 34px;
            display: flex;
            align-items: flex-end;
            justify-content: center
        }

        .reg-sign .line .sig {
            font-family: 'Caveat';
            font-size: 24px;
            color: var(--pen);
            font-weight: 600;
            padding-bottom: 2px
        }

        .reg-sign small {
            font-size: 11px;
            color: var(--ink-soft);
            letter-spacing: .05em;
            text-transform: uppercase
        }

        .reg-submit {
            white-space: nowrap
        }

        /* success state */
        .reg-success {
            text-align: center;
            padding: 40px 20px
        }

        .reg-success .tick-big {
            width: 72px;
            height: 72px;
            border-radius: 50%;
            background: var(--mint);
            color: var(--teal);
            display: grid;
            place-items: center;
            font-size: 36px;
            margin: 0 auto 18px;
        }

        .reg-success h3 {
            font-family: 'Bricolage Grotesque';
            font-size: 26px;
            font-weight: 800;
            margin-bottom: 8px
        }

        .reg-success p {
            color: var(--ink-soft);
            font-size: 15.5px;
            max-width: 420px;
            margin: 0 auto
        }

        .reg-success .stamp {
            display: inline-block;
            margin-top: 20px;
            border: 2.5px solid var(--rx);
            color: var(--rx);
            font-weight: 800;
            font-size: 13px;
            letter-spacing: .12em;
            text-transform: uppercase;
            padding: 8px 16px;
            border-radius: 8px;
            transform: rotate(-4deg);
        }

        /* ---------- plans / membership (marketplace) ---------- */
        .plans-sec {
            background: var(--paper-2)
        }

        .plans-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 22px;
            align-items: stretch
        }

        .plan {
            background: #fff;
            border: 1px solid var(--line);
            border-radius: 18px;
            padding: 30px 26px;
            display: flex;
            flex-direction: column;
            position: relative;
            transition: box-shadow .2s ease, transform .2s ease;
        }

        .plan:hover {
            box-shadow: var(--shadow);
            transform: translateY(-4px)
        }

        .plan.featured {
            border: 2px solid var(--pen);
            box-shadow: var(--shadow-lg)
        }

        .plan .tag {
            position: absolute;
            top: -13px;
            left: 50%;
            transform: translateX(-50%);
            background: var(--rx);
            color: #fff;
            font-size: 11.5px;
            font-weight: 800;
            letter-spacing: .04em;
            text-transform: uppercase;
            padding: 5px 14px;
            border-radius: 999px;
            white-space: nowrap;
        }

        .plan .pname {
            font-family: 'Bricolage Grotesque';
            font-weight: 800;
            font-size: 20px;
            color: var(--ink)
        }

        .plan .pdesc {
            font-size: 13.5px;
            color: var(--ink-soft);
            margin-top: 4px;
            min-height: 38px
        }

        .plan .price {
            margin: 16px 0 4px;
            display: flex;
            align-items: baseline;
            gap: 4px
        }

        .plan .price .amt {
            font-family: 'Bricolage Grotesque';
            font-weight: 800;
            font-size: 38px;
            color: var(--pen);
            letter-spacing: -.01em
        }

        .plan .price .per {
            font-size: 13.5px;
            color: var(--ink-soft)
        }

        .plan .free {
            font-family: 'Bricolage Grotesque';
            font-weight: 800;
            font-size: 38px;
            color: var(--teal);
            letter-spacing: -.01em
        }

        .plan ul {
            list-style: none;
            margin: 20px 0 24px;
            display: grid;
            gap: 11px
        }

        .plan ul li {
            display: flex;
            gap: 10px;
            align-items: flex-start;
            font-size: 14px;
            color: var(--ink)
        }

        .plan ul li .tk {
            min-width: 20px;
            height: 20px;
            border-radius: 50%;
            background: var(--mint);
            color: var(--teal);
            display: grid;
            place-items: center;
            font-size: 11px;
            font-weight: 800;
            margin-top: 1px
        }

        .plan ul li.off {
            color: var(--ink-soft);
            opacity: .6
        }

        .plan ul li.off .tk {
            background: var(--paper-2);
            color: var(--ink-soft)
        }

        .plan .btn {
            margin-top: auto;
            width: 100%;
            justify-content: center
        }

        .plans-note {
            text-align: center;
            margin-top: 28px;
            font-size: 14px;
            color: var(--ink-soft)
        }

        .plans-note .hand {
            font-size: 19px
        }

        @media (max-width:1000px) {
            .plans-grid {
                grid-template-columns: 1fr;
                max-width: 440px;
                margin: 0 auto
            }
        }

        /* ---------- final cta ---------- */
        .final {
            text-align: center;
            position: relative;
            overflow: hidden;
            background: #fff
        }

        .final .hand {
            font-size: 26px;
            display: inline-block;
            margin-bottom: 6px
        }

        .final h2 {
            font-size: clamp(48px, 6.4vw, 84px);
            font-weight: 700;
            letter-spacing: 0;
            max-width: 820px;
            margin: 0 auto 26px
        }

        .final .cta-row {
            display: flex;
            gap: 14px;
            justify-content: center;
            flex-wrap: wrap
        }

        .final .sub {
            margin-top: 16px;
            color: var(--ink-soft);
            font-size: 14.5px
        }

        .spark {
            position: absolute;
            font-size: 26px;
            color: var(--marker);
            pointer-events: none;
            user-select: none
        }

        .spark.r {
            color: var(--rx)
        }

        .spark.t {
            color: var(--teal)
        }

        /* ---------- footer ---------- */
        .footer {
            padding: 48px 0 36px;
            border-top: 1px solid var(--line);
            background: var(--paper-2)
        }

        .footer .wrap {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 18px
        }

        .footer .small {
            font-size: 13.5px;
            color: var(--ink-soft)
        }

        .footer .links {
            display: flex;
            gap: 22px;
            font-size: 14px;
            color: var(--ink-soft)
        }

        .footer .links a:hover {
            color: var(--pen)
        }

        /* ---------- reveal ---------- */
        .reveal {
            opacity: 0;
            transform: translateY(24px);
            transition: opacity .6s ease, transform .6s ease
        }

        .reveal.in {
            opacity: 1;
            transform: none
        }

        @media (prefers-reduced-motion:reduce) {
            * {
                animation: none !important;
                transition: none !important
            }

            .reveal {
                opacity: 1;
                transform: none
            }

            .circle-word svg path {
                stroke-dashoffset: 0
            }
        }

        /* ---------- responsive ---------- */
        @media (max-width:1000px) {

            .svc-grid,
            .why-grid,
            .testi-grid {
                grid-template-columns: repeat(2, 1fr)
            }

            .doc-grid {
                grid-template-columns: repeat(3, 1fr)
            }

            .proc-grid {
                grid-template-columns: repeat(2, 1fr)
            }

            .montage-sec .wrap,
            .pos-sec .wrap,
            .register .wrap {
                grid-template-columns: 1fr;
                gap: 48px
            }

            .montage {
                max-width: 520px;
                margin: 0 auto;
                min-height: 400px
            }

            .stats .grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 32px 24px
            }

            .mosaic {
                grid-template-columns: repeat(8, 1fr)
            }
        }

        @media (max-width:760px) {
            .doc-grid {
                grid-template-columns: repeat(2, 1fr)
            }

            .section {
                padding: 60px 0
            }

            .hero {
                padding: 52px 0 24px
            }
        }

        @media (max-width:680px) {
            .reg-grid {
                grid-template-columns: 1fr
            }

            .reg-footer {
                flex-direction: column-reverse;
                align-items: stretch
            }

            .reg-submit {
                width: 100%;
                justify-content: center
            }

            .pad-head {
                padding: 22px 22px
            }

            .pad-body {
                padding: 26px 22px 30px
            }
        }

        @media (max-width:480px) {

            .svc-grid,
            .why-grid,
            .testi-grid,
            .doc-grid,
            .proc-grid {
                grid-template-columns: 1fr
            }

            .mosaic {
                grid-template-columns: repeat(6, 1fr)
            }

            .stats .grid {
                grid-template-columns: 1fr 1fr
            }
        }

        /* ============================================================
   ADDON: GLOBAL MICRO-ANIMATIONS
   ============================================================ */

        /* twinkling sparks */
        @keyframes twinkle {

            0%,
            100% {
                opacity: .35;
                transform: scale(.85) rotate(0deg)
            }

            50% {
                opacity: 1;
                transform: scale(1.2) rotate(20deg)
            }
        }

        .spark {
            animation: twinkle 3.2s ease-in-out infinite
        }

        .spark.r {
            animation-delay: .8s
        }

        .spark.t {
            animation-delay: 1.6s
        }

        /* hero primary CTA - soft pulse glow */
        @keyframes pulseGlow {

            0%,
            100% {
                box-shadow: 0 0 0 0 rgba(255, 151, 0, .45)
            }

            50% {
                box-shadow: 0 0 0 12px rgba(255, 151, 0, 0)
            }
        }

        .hero .btn-solid.btn-lg {
            animation: pulseGlow 2.6s ease-out infinite
        }

        /* svc cards - ℞ number slides on hover */
        .svc:hover .rx-mini {
            transform: translateX(6px);
            color: var(--pen)
        }

        .svc .rx-mini {
            transition: transform .25s ease, color .25s ease
        }

        /* mosaic tiles gentle pulse */
        @keyframes mtilePulse {

            0%,
            100% {
                opacity: 1
            }

            50% {
                opacity: .55
            }
        }

        .mtile:not(.ph) {
            animation: mtilePulse 4s ease-in-out infinite
        }

        .mtile:nth-child(odd):not(.ph) {
            animation-delay: 2s
        }

        /* doc cards verified tick pop-in */
        @keyframes icPop {
            50% {
                transform: scale(1.18) rotate(-6deg)
            }
        }

        .doc-card:hover .doc-verified {
            animation: icPop .4s ease
        }

        /* jd arrow nudge (shared) */
        @keyframes jd-nudge {

            0%,
            100% {
                transform: translateX(0)
            }

            50% {
                transform: translateX(6px)
            }
        }

        /* smooth stagger for reveal children */
        .reveal.in {
            transition-delay: .05s
        }

        @media (prefers-reduced-motion:reduce) {

            .spark,
            .hero .btn-solid.btn-lg,
            .mtile {
                animation: none !important
            }
        }

        /* ============================================================
   ADDON v2: ODOO-STYLE HERO + JD CAROUSEL LAYOUT
   ============================================================ */

        /* ---------- hero base (restored) ---------- */
        .hero {
            position: relative;
            overflow: hidden
        }

        .hero-blob {
            position: absolute;
            top: -120px;
            right: -140px;
            width: 620px;
            height: 620px;
            border-radius: 50%;
            background: radial-gradient(circle at 30% 30%, rgba(14, 96, 110, .10), rgba(14, 96, 110, 0) 70%);
            z-index: 0
        }

        .hero .wrap {
            position: relative;
            z-index: 1
        }

        .hero .trust {
            margin-top: 32px;
            display: flex;
            align-items: center;
            gap: 14px;
            color: var(--ink-soft);
            font-size: 14px
        }

        .avatar-stack {
            display: flex
        }

        .avatar-stack .av {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            border: 2.5px solid var(--paper);
            display: grid;
            place-items: center;
            font-size: 12px;
            font-weight: 700;
            color: #fff;
            margin-left: -10px
        }

        .avatar-stack .av:first-child {
            margin-left: 0
        }

        /* ---------- hero (odoo) ---------- */
        .hero-odoo {
            padding: 64px 0 0;
            text-align: center
        }

        .hero-odoo .wrap {
            display: block
        }

        .hero-odoo h1 {
            font-size: clamp(56px, 8vw, 100px);
            line-height: 1.02;
            max-width: 1000px;
            margin: 0 auto
        }

        .hl2 {
            display: inline-block;
            padding: 0 14px;
            border-radius: 10px;
            transform: rotate(-1deg);
            background: linear-gradient(180deg, transparent 14%, #FFC24B 14%, #FFB100 86%, transparent 86%);
        }

        .hero-sub {
            font-family: 'Caveat';
            font-weight: 600;
            font-size: clamp(30px, 4.4vw, 52px);
            margin-top: 6px;
            color: var(--ink)
        }

        .u-wave {
            position: relative;
            padding-bottom: 4px
        }

        .u-wave::after {
            content: "";
            position: absolute;
            left: -2%;
            right: -2%;
            bottom: -8px;
            height: 12px;
            background: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 200 14'%3E%3Cpath d='M4 10 Q 60 2 110 7 T 196 6' fill='none' stroke='%232AA8E0' stroke-width='7' stroke-linecap='round'/%3E%3C/svg%3E") no-repeat center/100% 100%;
        }

        .cta-center {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 14px;
            margin-top: 36px;
            flex-wrap: wrap
        }

        .btn-lite {
            background: var(--paper-2);
            border-color: var(--paper-2);
            color: var(--ink)
        }

        .btn-lite:hover {
            background: var(--mint);
            border-color: var(--mint);
            transform: translateY(-2px)
        }

        .price-scribble {
            display: flex;
            align-items: flex-start;
            margin-left: 8px
        }

        .ps-arrow {
            width: 46px;
            height: 42px;
            flex-shrink: 0;
            margin-top: -12px
        }

        .price-scribble span {
            font-family: 'Caveat';
            font-size: 25px;
            font-weight: 700;
            color: var(--ink);
            line-height: 1.05;
            text-align: left;
            display: inline-block;
            transform: rotate(-8deg);
            margin-top: 18px;
        }

        .hero-odoo .trust {
            justify-content: center;
            margin-top: 36px
        }

        .hero-curve {
            width: 130%;
            margin-left: -15%;
            height: 110px;
            margin-top: 56px;
            background: var(--paper-2);
            border-radius: 50% 50% 0 0 / 100% 100% 0 0;
        }

        /* ---------- JD services layout ---------- */
        .jd-sec {
            background: var(--paper-2);
            padding-top: 24px
        }

        .jd-layout {
            display: grid;
            grid-template-columns: 40fr 60fr;
            gap: 16px;
            align-items: stretch;
            margin-bottom: 32px;
            width: 100vw;
            margin-left: calc(50% - 50vw);
            padding: 0 32px;
        }

        /* carousel */
        .jd-slider {
            position: relative;
            border-radius: 18px;
            overflow: hidden;
            min-height: 290px;
            box-shadow: var(--shadow)
        }

        .jd-slide {
            position: absolute;
            inset: 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 30px 38px;
            color: #fff;
            opacity: 0;
            visibility: hidden;
            transition: opacity .55s ease, visibility .55s;
        }

        .jd-slide.on {
            opacity: 1;
            visibility: visible
        }

        .jd-slide .tagline {
            font-size: 12.5px;
            font-weight: 700;
            letter-spacing: .08em;
            text-transform: uppercase;
            opacity: .85
        }

        .jd-slide h3 {
            font-family: 'Bricolage Grotesque';
            font-size: clamp(24px, 2.6vw, 34px);
            font-weight: 800;
            line-height: 1.12;
            margin: 8px 0 18px
        }

        .sl-btn {
            display: inline-flex;
            background: #fff;
            color: var(--ink);
            font-weight: 700;
            font-size: 14px;
            padding: 11px 22px;
            border-radius: 999px;
            transition: transform .2s
        }

        .sl-btn:hover {
            transform: translateY(-2px)
        }

        .jd-slide .emo {
            font-size: 110px;
            filter: drop-shadow(0 10px 18px rgba(0, 0, 0, .25))
        }

        .jd-prev,
        .jd-next {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            width: 36px;
            height: 36px;
            border-radius: 50%;
            border: none;
            background: rgba(255, 255, 255, .92);
            color: var(--ink);
            font-size: 20px;
            font-weight: 800;
            cursor: pointer;
            z-index: 2;
            display: grid;
            place-items: center;
            font-family: 'Inter';
        }

        .jd-prev {
            left: 12px
        }

        .jd-next {
            right: 12px
        }

        .jd-prev:hover,
        .jd-next:hover {
            background: #fff
        }

        .jd-dots {
            position: absolute;
            bottom: 14px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 7px;
            z-index: 2
        }

        .jd-dots span {
            width: 8px;
            height: 8px;
            border-radius: 99px;
            background: rgba(255, 255, 255, .5);
            cursor: pointer;
            transition: all .25s
        }

        .jd-dots span.on {
            background: #fff;
            width: 22px
        }

        /* right cards */
        .jd-cards {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 12px
        }

        .jd-mini {
            position: relative;
            border-radius: 16px;
            padding: 18px 14px;
            color: #fff;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            min-height: 290px;
            box-shadow: 0 8px 20px rgba(19, 52, 59, .14);
            transition: transform .25s ease, box-shadow .25s ease;
        }

        .jd-mini:hover {
            transform: translateY(-8px);
            box-shadow: 0 18px 40px rgba(19, 52, 59, .24)
        }

        .jd-mini h3 {
            font-family: 'Bricolage Grotesque';
            font-size: 17px;
            font-weight: 800;
            text-transform: uppercase;
            line-height: 1.15
        }

        .jd-mini .sub {
            font-size: 12.5px;
            opacity: .92;
            margin-top: 5px;
            line-height: 1.35
        }

        .jd-mini .big {
            position: absolute;
            right: -10px;
            bottom: 16px;
            font-size: 66px;
            opacity: .95;
            transition: transform .3s ease
        }

        .jd-mini:hover .big {
            transform: scale(1.15) rotate(-6deg)
        }

        .jd-mini .go {
            margin-top: auto;
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: #fff;
            color: var(--ink);
            display: grid;
            place-items: center;
            font-size: 18px;
            font-weight: 800;
            position: relative;
            z-index: 1;
            animation: jd-nudge 2.2s ease-in-out infinite;
        }

        /* responsive */
        @media (max-width:1000px) {
            .jd-layout {
                grid-template-columns: 1fr
            }
        }

        @media (max-width:760px) {
            .jd-layout {
                padding: 0 16px
            }

            .jd-cards {
                grid-template-columns: repeat(2, 1fr)
            }

            .jd-mini {
                min-height: 225px
            }

            .jd-slider {
                min-height: 240px
            }

            .jd-slide {
                padding: 22px 24px
            }

            .jd-slide .emo {
                font-size: 70px
            }

            .price-scribble {
                width: 100%;
                justify-content: center;
                margin-left: 0
            }

            .hero-curve {
                height: 70px;
                margin-top: 40px
            }
        }

        @media (prefers-reduced-motion:reduce) {
            .jd-mini .go {
                animation: none
            }
        }

        @media (max-width:760px) {
            .montage-sec .wrap {
                display: none;
            }

            .montage {
                display: none;
                transform: scale(.32);
                transform-origin: top center;
                min-height: 280px;
                margin-bottom: -90px;
            }
        }

        @media (max-width:480px) {
            .montage {
                display: none;
                transform: scale(.22);
                transform-origin: top center;
                min-height: 230px;
                margin-bottom: -130px;
            }
        }

        /* ============================================================
   ADDON v3: SEARCH, FILTERS, PAGE-HERO, DOCTOR PROFILE
   ============================================================ */

        /* ---------- hero search bar (index) ---------- */
        .hero-search {
            max-width: 720px;
            margin: 34px auto 0;
            background: #fff;
            border: 1px solid var(--line);
            border-radius: 999px;
            box-shadow: var(--shadow-lg);
            display: flex;
            align-items: center;
            padding: 8px;
            gap: 6px;
            text-align: left;
        }

        .hero-search select,
        .hero-search input[type=text] {
            border: none;
            background: transparent;
            font-family: 'Inter';
            font-size: 15px;
            color: var(--ink);
            padding: 12px 16px;
            outline: none;
        }

        .hero-search select {
            solid var(--line);
            max-width: 170px;
            flex-shrink: 0
        }

        .hero-search input[type=text] {
            flex: 1;
            min-width: 0
        }

        .hero-search button {
            flex-shrink: 0
        }

        @media (max-width:680px) {
            .hero-search {
                flex-direction: column;
                border-radius: 20px;
                align-items: stretch;
                padding: 10px
            }

            .hero-search select {
                border-right: none;
                border-bottom: 1px solid var(--line);
                max-width: none
            }

            .hero-search button {
                width: 100%;
                justify-content: center
            }
        }

        /* ---------- page hero (inner pages) ---------- */
        .page-hero {
            padding: 60px 0 36px;
            text-align: center;
            background: var(--paper-2)
        }

        .page-hero h1 {
            font-size: clamp(38px, 5.6vw, 58px)
        }

        .page-hero p {
            margin-top: 12px;
            color: var(--ink-soft);
            font-size: 16px;
            max-width: 560px;
            margin-left: auto;
            margin-right: auto
        }

        /* ---------- search results filters ---------- */
        .search-bar-wrap {
            background: var(--paper-2);
            padding-bottom: 8px
        }

        .filters-panel {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            align-items: center;
            margin-bottom: 28px
        }

        .filters-panel select,
        .filters-panel input[type=text] {
            font-family: 'Inter';
            font-size: 14px;
            color: var(--ink);
            padding: 11px 14px;
            border: 1.5px solid var(--line);
            border-radius: 10px;
            background: #fff;
        }

        .filters-panel .fp-search {
            flex: 1;
            min-width: 180px
        }

        .results-count {
            color: var(--ink-soft);
            font-size: 14.5px;
            margin-bottom: 18px
        }

        /* ---------- doctor profile page ---------- */
        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            color: var(--pen);
            font-weight: 700;
            font-size: 14px;
            margin-bottom: 24px
        }

        .back-link:hover {
            text-decoration: underline
        }

        .profile-wrap {
            max-width: 800px;
            margin: 0 auto
        }

        .profile-head {
            display: flex;
            gap: 22px;
            align-items: center;
            flex-wrap: wrap
        }

        .profile-av {
            width: 88px;
            height: 88px;
            border-radius: 22px;
            display: grid;
            place-items: center;
            color: #fff;
            font-weight: 800;
            font-size: 30px;
            font-family: 'Bricolage Grotesque';
            flex-shrink: 0
        }

        .profile-info h1 {
            font-family: 'Bricolage Grotesque';
            font-size: clamp(24px, 3.4vw, 30px);
            font-weight: 800;
            line-height: 1.2
        }

        .profile-info .spec {
            color: var(--pen);
            font-weight: 700;
            margin-top: 4px;
            font-size: 15px
        }

        .profile-meta {
            display: flex;
            gap: 18px;
            flex-wrap: wrap;
            margin-top: 16px;
            font-size: 14px;
            color: var(--ink-soft)
        }

        .profile-meta b {
            color: var(--ink)
        }

        .profile-meta .star {
            color: #FFB100
        }

        .profile-body {
            margin-top: 34px;
            display: grid;
            gap: 28px
        }

        .profile-block h3 {
            font-family: 'Bricolage Grotesque';
            font-size: 18px;
            margin-bottom: 10px
        }

        .profile-block p {
            color: var(--ink-soft);
            font-size: 15px
        }

        .profile-services {
            display: flex;
            flex-wrap: wrap;
            gap: 10px
        }

        .profile-cta {
            display: flex;
            gap: 14px;
            flex-wrap: wrap;
            margin-top: 8px
        }
    </style>
</head>

<body x-data="{ mobileOpen: false }">

    <!-- ================= HEADER (clean) ================= -->
    <header class="header">
        <div class="wrap">
            <a href="index.php" class="logo"><img src="{{ Vite::asset(config('constants.company_logo')) }}"
                    alt="PMS" class="logo-img"></a>
            <div class="head-right">
                <a href="#register-form" class="btn btn-solid head-login">Login</a>
                <button class="menu-btn" @click="mobileOpen=!mobileOpen" aria-label="Toggle menu"
                    :aria-expanded="mobileOpen">
                    <span class="hb" :class="{ x: mobileOpen }"><i></i><i></i><i></i></span>
                </button>
            </div>
        </div>

        <!-- drawer menu -->
        <div class="drawer-bg" x-show="mobileOpen" x-cloak @click="mobileOpen=false"></div>
        <nav class="drawer" :class="{ open: mobileOpen }" x-cloak>
            <a href="#services" @click="mobileOpen=false">Services</a>
            <a href="#online" @click="mobileOpen=false">Practice Online</a>
            <a href="#why" @click="mobileOpen=false">Why Join</a>
            <a href="#plans" @click="mobileOpen=false">Plans</a>
            <a href="#doctors" @click="mobileOpen=false">Community</a>
            <a href="#faq" @click="mobileOpen=false">FAQ</a>
            <a href="contact.php" @click="mobileOpen=false">Contact</a>
            <a href="#register-form" class="drawer-cta" @click="mobileOpen=false">Register as Doctor →</a>
        </nav>
    </header>

    <div x-data="{
        doctors: [{ & quot;id & quot;: 1, & quot;name & quot;: & quot;Dr.Rajesh Sharma & quot;, & quot;spec & quot;: & quot;Orthopedic & quot;, & quot;city & quot;: & quot;Jaipur & quot;, & quot;color & quot;: & quot;#2447B2&quot;,&quot;init&quot;:&quot;RS&quot;,&quot;exp&quot;:&quot;12 yrs&quot;,&quot;rating&quot;:&quot;4.9&quot;,&quot;clinic&quot;:&quot;Sharma Ortho Clinic&quot;,&quot;phone&quot;:&quot;919000000001&quot;,&quot;about&quot;:&quot;Dr. Rajesh Sharma is an orthopedic surgeon with over a decade of experience treating joint, spine and sports injuries. Known for a calm, detailed approach with patients of all ages.&quot;,&quot;services&quot;:[&quot;Website&quot;,&quot;WhatsApp&quot;,&quot;Local SEO&quot;,&quot;Reviews&quot;]},{&quot;id&quot;:2,&quot;name&quot;:&quot;Dr. Anita Patel&quot;,&quot;spec&quot;:&quot;Dentist&quot;,&quot;city&quot;:&quot;Ahmedabad&quot;,&quot;color&quot;:&quot;# 0 F8A73 & quot;, & quot;init & quot;: & quot;AP & quot;, & quot;exp & quot;: & quot;8 yrs & quot;, & quot;rating & quot;: & quot;4.8 & quot;, & quot;clinic & quot;: & quot;Patel Dental Care & quot;, & quot;phone & quot;: & quot;919000000002 & quot;, & quot;about & quot;: & quot;Dr.Anita Patel runs a modern dental practice focused on preventive care, cosmetic dentistry and gentle treatment for anxious patients. & quot;, & quot;services & quot;: [ & quot;Website & quot;, & quot;Social Media & quot;, & quot;Reviews & quot;] }, { & quot;id & quot;: 3, & quot;name & quot;: & quot;Dr.Neha Kulkarni & quot;, & quot;spec & quot;: & quot;Physiotherapist & quot;, & quot;city & quot;: & quot;Pune & quot;, & quot;color & quot;: & quot;#D93B4A & quot;, & quot;init & quot;: & quot;NK & quot;, & quot;exp & quot;: & quot;6 yrs & quot;, & quot;rating & quot;: & quot;5.0 & quot;, & quot;clinic & quot;: & quot;Kulkarni Physiotherapy & amp;Rehab & quot;, & quot;phone & quot;: & quot;919000000003 & quot;, & quot;about & quot;: & quot;Dr.Neha Kulkarni specialises in sports rehabilitation and post - surgery physiotherapy, helping patients recover mobility with personalised recovery plans. & quot;, & quot;services & quot;: [ & quot;Website & quot;, & quot;WhatsApp & quot;, & quot;Local SEO & quot;] }, { & quot;id & quot;: 4, & quot;name & quot;: & quot;Dr.Sanjay Mehta & quot;, & quot;spec & quot;: & quot;Orthopedic & quot;, & quot;city & quot;: & quot;Indore & quot;, & quot;color & quot;: & quot;#7A5AF8&quot;,&quot;init&quot;:&quot;SM&quot;,&quot;exp&quot;:&quot;15 yrs&quot;,&quot;rating&quot;:&quot;4.7&quot;,&quot;clinic&quot;:&quot;Mehta Bone &amp; Joint Hospital&quot;,&quot;phone&quot;:&quot;919000000004&quot;,&quot;about&quot;:&quot;Dr. Sanjay Mehta has 15 years of experience in joint replacement and trauma surgery, and is a trusted name for orthopedic care in Indore.&quot;,&quot;services&quot;:[&quot;Website&quot;,&quot;Paid Ads&quot;,&quot;Reviews&quot;]},{&quot;id&quot;:5,&quot;name&quot;:&quot;Dr. Priya Verma&quot;,&quot;spec&quot;:&quot;Dentist&quot;,&quot;city&quot;:&quot;Lucknow&quot;,&quot;color&quot;:&quot;# E07B2A & quot;, & quot;init & quot;: & quot;PV & quot;, & quot;exp & quot;: & quot;9 yrs & quot;, & quot;rating & quot;: & quot;4.9 & quot;, & quot;clinic & quot;: & quot;Verma Smile Studio & quot;, & quot;phone & quot;: & quot;919000000005 & quot;, & quot;about & quot;: & quot;Dr.Priya Verma focuses on cosmetic and restorative dentistry, helping patients across Lucknow get confident, healthy smiles. & quot;, & quot;services & quot;: [ & quot;Website & quot;, & quot;WhatsApp & quot;, & quot;Social Media & quot;] }, { & quot;id & quot;: 6, & quot;name & quot;: & quot;Dr.Amit Singh & quot;, & quot;spec & quot;: & quot;Physiotherapist & quot;, & quot;city & quot;: & quot;Delhi & quot;, & quot;color & quot;: & quot;#0F8A73&quot;,&quot;init&quot;:&quot;AS&quot;,&quot;exp&quot;:&quot;7 yrs&quot;,&quot;rating&quot;:&quot;4.8&quot;,&quot;clinic&quot;:&quot;Singh Physio Point&quot;,&quot;phone&quot;:&quot;919000000006&quot;,&quot;about&quot;:&quot;Dr. Amit Singh works with patients recovering from injury and chronic pain, combining manual therapy with structured exercise plans.&quot;,&quot;services&quot;:[&quot;Website&quot;,&quot;Local SEO&quot;,&quot;Reviews&quot;]},{&quot;id&quot;:7,&quot;name&quot;:&quot;Dr. Kavita Rao&quot;,&quot;spec&quot;:&quot;Gynecologist&quot;,&quot;city&quot;:&quot;Hyderabad&quot;,&quot;color&quot;:&quot;# 2447 B2 & quot;, & quot;init & quot;: & quot;KR & quot;, & quot;exp & quot;: & quot;14 yrs & quot;, & quot;rating & quot;: & quot;5.0 & quot;, & quot;clinic & quot;: & quot;Rao Women & #039;s Clinic&quot;,&quot;phone&quot;:&quot;919000000007&quot;,&quot;about&quot;:&quot;Dr. Kavita Rao is a senior gynecologist with 14 years of experience in women&# 039;s health, pregnancy care and minimally invasive procedures. & quot;, & quot;services & quot;: [ & quot;Website & quot;, & quot;WhatsApp & quot;, & quot;Paid Ads & quot;] }, { & quot;id & quot;: 8, & quot;name & quot;: & quot;Dr.Rohit Bansal & quot;, & quot;spec & quot;: & quot;Dermatologist & quot;, & quot;city & quot;: & quot;Chandigarh & quot;, & quot;color & quot;: & quot;#D93B4A & quot;, & quot;init & quot;: & quot;RB & quot;, & quot;exp & quot;: & quot;10 yrs & quot;, & quot;rating & quot;: & quot;4.9 & quot;, & quot;clinic & quot;: & quot;Bansal Skin & amp;Hair Clinic & quot;, & quot;phone & quot;: & quot;919000000008 & quot;, & quot;about & quot;: & quot;Dr.Rohit Bansal treats a wide range of skin, hair and cosmetic concerns using evidence - based dermatology and modern in -clinic procedures. & quot;, & quot;services & quot;: [ & quot;Website & quot;, & quot;Social Media & quot;, & quot;Reviews & quot;] }, { & quot;id & quot;: 9, & quot;name & quot;: & quot;Dr.Meera Desai & quot;, & quot;spec & quot;: & quot;Pediatrician & quot;, & quot;city & quot;: & quot;Mumbai & quot;, & quot;color & quot;: & quot;#0EA5A5&quot;,&quot;init&quot;:&quot;MD&quot;,&quot;exp&quot;:&quot;11 yrs&quot;,&quot;rating&quot;:&quot;4.9&quot;,&quot;clinic&quot;:&quot;Desai Child Care&quot;,&quot;phone&quot;:&quot;919000000009&quot;,&quot;about&quot;:&quot;Dr. Meera Desai has spent over a decade caring for infants and children, and is known for her patient, parent-friendly approach.&quot;,&quot;services&quot;:[&quot;Website&quot;,&quot;WhatsApp&quot;,&quot;Local SEO&quot;]},{&quot;id&quot;:10,&quot;name&quot;:&quot;Dr. Vikram Kapoor&quot;,&quot;spec&quot;:&quot;General Physician&quot;,&quot;city&quot;:&quot;Jaipur&quot;,&quot;color&quot;:&quot;# E07B2A & quot;, & quot;init & quot;: & quot;VK & quot;, & quot;exp & quot;: & quot;13 yrs & quot;, & quot;rating & quot;: & quot;4.8 & quot;, & quot;clinic & quot;: & quot;Kapoor Family Clinic & quot;, & quot;phone & quot;: & quot;919000000010 & quot;, & quot;about & quot;: & quot;Dr.Vikram Kapoor provides comprehensive primary care for the whole family, with a focus on preventive health and chronic disease management. & quot;, & quot;services & quot;: [ & quot;Website & quot;, & quot;Reviews & quot;] }],
        activeSpec: 'All',
        activeCity: '',
        term: '',
        sortBy: 'rating',
        cats: [ & quot;All & quot;, & quot;Orthopedic & quot;, & quot;Dentist & quot;, & quot;Physiotherapist & quot;, & quot;Gynecologist & quot;, & quot;Dermatologist & quot;, & quot;Pediatrician & quot;, & quot;General Physician & quot;],
        cities: [ & quot;Jaipur & quot;, & quot;Ahmedabad & quot;, & quot;Pune & quot;, & quot;Indore & quot;, & quot;Lucknow & quot;, & quot;Delhi & quot;, & quot;Hyderabad & quot;, & quot;Chandigarh & quot;, & quot;Mumbai & quot;],
        get filtered() {
            let list = this.doctors;
            if (this.activeSpec !== 'All') list = list.filter(d => d.spec === this.activeSpec);
            if (this.activeCity) list = list.filter(d => d.city === this.activeCity);
            if (this.term.trim() !== '') {
                const t = this.term.trim().toLowerCase();
                list = list.filter(d => d.name.toLowerCase().includes(t) || d.spec.toLowerCase().includes(t) || d.city.toLowerCase().includes(t) || d.clinic.toLowerCase().includes(t));
            }
            list = [...list].sort((a, b) => this.sortBy === 'rating' ? (b.rating - a.rating) : (parseInt(b.exp) - parseInt(a.exp)));
            return list;
        }
    }">
        <section class="page-hero">
            <div class="wrap">
                <h1>Find the right <span class="hl2">doctor</span></h1>
                <p>Search the PMS community by specialty, name or city.</p>
                <form class="hero-search" @submit.prevent="$refs.resultsTop.scrollIntoView({behavior:'smooth'})">
                    <select x-model="activeCity">
                        <option value="">All Locations</option>
                        <template x-for="c in cities" :key="c">
                            <option :value="c" x-text="c"></option>
                        </template>
                    </select>
                    <input type="text" x-model="term" placeholder="Looking for… e.g. Orthopedic, Dentist, Dr. name">
                    <button type="submit" class="btn btn-solid">Search</button>
                </form>
            </div>
        </section>

        <section class="section search-bar-wrap">
            <div class="wrap" x-ref="resultsTop">
                <div class="filters-panel">
                    <template x-for="c in cats" :key="c">
                        <button class="filter-btn" :class="{ active: activeSpec === c }" @click="activeSpec=c"
                            x-text="c"></button>
                    </template>
                    <select x-model="activeCity">
                        <option value="">All Locations</option>
                        <template x-for="c in cities" :key="c">
                            <option :value="c" x-text="c"></option>
                        </template>
                    </select>
                    <input class="fp-search" type="text" x-model="term"
                        placeholder="Search by name, specialty or clinic…">
                    <select x-model="sortBy">
                        <option value="rating">Sort: Top rated</option>
                        <option value="exp">Sort: Most experienced</option>
                    </select>
                </div>

                <p class="results-count"
                    x-text="filtered.length + ' doctor' + (filtered.length===1?'':'s') + ' found'"></p>

                {{-- <div class="doc-grid">
          <template x-for="d in filtered" :key="d.id">
            <div class="doc-card">
              <span class="doc-verified">✓ Verified</span>
              <div class="doc-head">
                <div class="doc-av" :style="'background:'+d.color" x-text="d.init"></div>
                <div class="doc-id">
                  <h3 x-text="d.name"></h3>
                  <div class="spec" x-text="d.spec"></div>
                </div>
              </div>
              <div class="doc-meta">
                <span class="mi star">★ <b x-text="d.rating"></b></span>
                <span class="mi"><b x-text="d.exp"></b></span>
                <span class="mi">📍 <span x-text="d.city"></span></span>
              </div>
              <a :href="'doctor-details.php?id='+d.id" class="doc-view">View Profile →</a>
            </div>
          </template>
          <p class="empty-note" x-show="filtered.length===0">No doctors match these filters yet - try a different specialty or city.</p>
        </div> --}}
                <div class="d-flex flex-wrap gap-4 justify-center">
                    @forelse($landingPages ?? [] as $landingPage)
                        <x-cards.dr_card :landing-page="$landingPage" />
                    @empty
                        <x-cards.dr_card />
                    @endforelse
                </div>
            </div>
        </section>
    </div>

    <!-- ================= Rx SERVICE CARDS ================= -->
    <section class="section services">
        <div class="wrap">
            <div class="section-head reveal">
                <span class="hand hand-note">Doctor’s orders - for your own clinic this time.</span>
                <h2>Our prescription for a busier clinic</h2>
                <p>The core treatments, explained. Each one handled by a team that only works with healthcare.</p>
            </div>
            <div class="svc-grid">
                <div class="svc reveal">
                    <div class="rx-mini">℞ 01</div>
                    <h3>Doctor Websites</h3>
                    <p>Fast, mobile-first website with services, timings, gallery and one-tap WhatsApp booking. Built to
                        turn visitors into appointments.</p>
                    <div class="dose">Dosage: once. Side effect: more patients.</div>
                </div>
                <div class="svc reveal">
                    <div class="rx-mini">℞ 02</div>
                    <h3>WhatsApp Marketing</h3>
                    <p>Appointment reminders, health-tip broadcasts and follow-up campaigns sent to your patient list -
                        fully compliant.</p>
                    <div class="dose">Dosage: daily broadcast, after breakfast.</div>
                </div>
                <div class="svc reveal">
                    <div class="rx-mini">℞ 03</div>
                    <h3>Social Media Marketing</h3>
                    <p>Specialty-specific reels, patient-education posts and testimonial creatives that build trust
                        before the first visit.</p>
                    <div class="dose">Dosage: 3 posts per week, no skipping.</div>
                </div>
                <div class="svc reveal">
                    <div class="rx-mini">℞ 04</div>
                    <h3>Local SEO &amp; Google Business</h3>
                    <p>Rank for “dentist near me” and “physiotherapist in your city”. Profile optimisation, reviews and
                        map-pack domination.</p>
                    <div class="dose">Dosage: continue 3 months for full effect.</div>
                </div>
                <div class="svc reveal">
                    <div class="rx-mini">℞ 05</div>
                    <h3>Paid Ads for Clinics</h3>
                    <p>Google and Meta campaigns targeted to patients in your area, tracked till the appointment call -
                        not just clicks.</p>
                    <div class="dose">Dosage: as prescribed by your budget.</div>
                </div>
                <div class="svc reveal">
                    <div class="rx-mini">℞ 06</div>
                    <h3>Reputation Management</h3>
                    <p>More 5-star Google reviews, professional replies to feedback, and an online image that matches
                        your real-world care.</p>
                    <div class="dose">Dosage: as needed. Highly recommended.</div>
                </div>
            </div>
        </div>
    </section>

    <!-- ================= SPECIALTIES STRIP ================= -->
    <section class="spec-strip" id="specialties">
        <div class="wrap">
            <span class="label">We speak your specialty:</span>
            <span class="chip hot">Orthopedic</span>
            <span class="chip hot">Dentist</span>
            <span class="chip hot">Physiotherapist</span>
            <span class="chip">Gynecologist</span>
            <span class="chip">Pediatrician</span>
            <span class="chip">Dermatologist</span>
            <span class="chip">General Physician</span>
            <span class="chip">+ more</span>
        </div>
    </section>

    <!-- ================= PRACTICE ONLINE MONTAGE ================= -->
    <section class="section montage-sec" id="online">
        <div class="wrap">
            <div class="montage reveal" aria-hidden="true">
                <div class="mock mock-web">
                    <div class="bar"><i></i><i></i><i></i></div>
                    <div class="body">
                        <div class="hbar">Dr. Sharma · Orthopedic</div>
                        <div class="row"></div>
                        <div class="row"></div>
                        <div class="row s"></div>
                        <div class="cta">Book on WhatsApp</div>
                    </div>
                </div>
                <div class="mock mock-rev">
                    <div class="g">🇬 Google</div>
                    <div class="stars">★★★★★</div>
                    <div class="num">4.9</div>
                    <small>238 patient reviews</small>
                </div>
                <div class="mock mock-ig">
                    <div class="pic"></div>
                    <div class="cap">
                        <div class="l">♥ 1,204</div>
                        <div class="row"></div>
                        <div class="row s"></div>
                    </div>
                </div>
                <div class="mock mock-wa">
                    <div class="wtop">
                        <div class="dot">✓</div><b>Clinic Broadcast</b>
                    </div>
                    <div class="bub">Reminder: Your check-up is tomorrow at 5 PM 🦷</div>
                    <div class="bub me">Thank you! See you 😊</div>
                    <div class="bub">Tip: 2 free slots this Saturday - reply BOOK</div>
                </div>
            </div>
            <div class="montage-txt reveal">
                <span class="hand">Everything working together, while you see patients.</span>
                <h2>Your whole practice, <span class="hl">online &amp; booked</span></h2>
                <ul class="feat-list">
                    <li><span class="tick">✓</span> A website that ranks and converts - not just a digital visiting
                        card.</li>
                    <li><span class="tick">✓</span> WhatsApp broadcasts that fill empty appointment slots.</li>
                    <li><span class="tick">✓</span> A 4.9★ Google profile that patients trust before they call.</li>
                    <li><span class="tick">✓</span> Reels and posts that keep your name in the feed all week.</li>
                </ul>
                <div style="margin-top:26px"><a href="#register" class="btn btn-solid">See it for your clinic →</a>
                </div>
            </div>
        </div>
    </section>

    <!-- ================= STATS ================= -->
    <section class="section stats">
        <div class="wrap">
            <span class="hand-lead">The vitals look healthy -</span>
            <h2>Numbers our doctors actually feel</h2>
            <div class="grid">
                <div class="stat reveal">
                    <div class="n">100<span class="plus">%</span></div>
                    <div class="l">Custom healthcare solutions</div>
                </div>
                <div class="stat reveal">
                    <div class="n">3.4<span class="plus">×</span></div>
                    <div class="l">Avg. appointment growth</div>
                </div>
                <div class="stat reveal">
                    <div class="n">18K<span class="plus">+</span></div>
                    <div class="l">Patient enquiries driven</div>
                </div>
                <div class="stat reveal">
                    <div class="n">4.9<span class="plus">★</span></div>
                    <div class="l">Avg. Google rating built</div>
                </div>
            </div>
        </div>
    </section>

    <!-- ================= WHY CHOOSE ================= -->
    <section class="section" id="why">
        <div class="wrap">
            <div class="section-head center reveal">
                <span class="hand hand-note">More than an agency - a community.</span>
                <h2>Why doctors join our community</h2>
                <p>A community that only works with healthcare - shared growth, member-only pricing, and services that
                    understand a clinic.</p>
            </div>
            <div class="why-grid">
                <div class="why-card reveal">
                    <div class="em" style="background:var(--mint)">🩺</div>
                    <h3>Healthcare-only focus</h3>
                    <p>We don’t do restaurants and real estate on the side. Every campaign is shaped by how patients
                        choose a doctor.</p>
                </div>
                <div class="why-card reveal">
                    <div class="em" style="background:#EEE9FF">🔒</div>
                    <h3>No lock-in contracts</h3>
                    <p>Month-to-month plans. Stay because it’s working, not because a contract traps you.</p>
                </div>
                <div class="why-card reveal">
                    <div class="em" style="background:#FDEEE0">💸</div>
                    <h3>Transparent pricing</h3>
                    <p>One clear monthly price with everything included. No hidden ad markups, no per-feature charges.
                    </p>
                </div>
                <div class="why-card reveal">
                    <div class="em" style="background:#E4F6F9">⚡</div>
                    <h3>Fast setup</h3>
                    <p>Your profile and first campaign can go live within a week - not months of onboarding.</p>
                </div>
                <div class="why-card reveal">
                    <div class="em" style="background:#FCE7EB">🛡️</div>
                    <h3>Compliance-aware</h3>
                    <p>We keep your messaging and claims within medical advertising norms, so your reputation stays
                        clean.</p>
                </div>
                <div class="why-card reveal">
                    <div class="em" style="background:#E7F3EC">📈</div>
                    <h3>Reporting you understand</h3>
                    <p>Plain monthly reports: enquiries, appointments and reviews - not vanity metrics.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ================= PLANS / MEMBERSHIP ================= -->
    <section class="section plans-sec" id="plans">
        <div class="wrap">
            <div class="section-head center reveal">
                <span class="hand hand-note">Free to join - pay only for what you need.</span>
                <h2>Membership &amp; services</h2>
                <p>Join the community for free, then pick a plan from the marketplace. Every plan is month-to-month with
                    no lock-in.</p>
            </div>
            <div class="plans-grid">
                <div class="plan reveal">
                    <div class="pname">Community</div>
                    <div class="pdesc">Get listed and become part of the network.</div>
                    <div class="price"><span class="free">Free</span></div>
                    <ul>
                        <li><span class="tk">✓</span> Verified profile in the directory</li>
                        <li><span class="tk">✓</span> Listed to patients searching your city</li>
                        <li><span class="tk">✓</span> Community updates &amp; resources</li>
                        <li class="off"><span class="tk">–</span> Marketing services</li>
                        <li class="off"><span class="tk">–</span> Campaign management</li>
                    </ul>
                    <a href="#register-form" class="btn btn-ghost">Join free</a>
                </div>

                <div class="plan featured reveal">
                    <div class="tag">Most popular</div>
                    <div class="pname">Growth</div>
                    <div class="pdesc">The essentials to bring in more patients.</div>
                    <div class="price"><span class="amt">₹2,999</span><span class="per">/ month</span></div>
                    <ul>
                        <li><span class="tk">✓</span> Everything in Community</li>
                        <li><span class="tk">✓</span> Doctor website + WhatsApp booking</li>
                        <li><span class="tk">✓</span> Google Business &amp; local SEO</li>
                        <li><span class="tk">✓</span> 3 social posts / week</li>
                        <li><span class="tk">✓</span> Monthly growth report</li>
                    </ul>
                    <a href="#register-form" class="btn btn-solid">Choose Growth</a>
                </div>

                <div class="plan reveal">
                    <div class="pname">Pro</div>
                    <div class="pdesc">Full-scale growth for busy practices.</div>
                    <div class="price"><span class="amt">₹6,999</span><span class="per">/ month</span></div>
                    <ul>
                        <li><span class="tk">✓</span> Everything in Growth</li>
                        <li><span class="tk">✓</span> Google &amp; Meta paid ads</li>
                        <li><span class="tk">✓</span> Reels &amp; video content</li>
                        <li><span class="tk">✓</span> Reputation &amp; review management</li>
                        <li><span class="tk">✓</span> Priority support</li>
                    </ul>
                    <a href="#register-form" class="btn btn-ghost">Choose Pro</a>
                </div>
            </div>
            <p class="plans-note"><span class="hand">Not sure which fits?</span> Join free and our team helps you
                pick - ad budgets billed separately, always transparent.</p>
        </div>
    </section>

    <!-- ================= POSITIONING QUADRANT ================= -->
    <section class="section pos-sec">
        <div class="wrap">
            <div class="pos-txt reveal">
                <span class="hand">Where we sit on the map -</span>
                <h2>Specialised, and still affordable</h2>
                <p>Big agencies are expensive and generic. Cheap freelancers don’t understand healthcare. PMS is the
                    rare corner: built only for doctors, priced for a single clinic.</p>
                <div style="margin-top:24px"><a href="#register" class="btn btn-red">Get on the map →</a></div>
            </div>
            <div class="quad reveal" role="img"
                aria-label="Positioning chart: PMS is both healthcare-specialised and affordable">
                <div class="axis-x"></div>
                <div class="axis-y"></div>
                <span class="lbl top">Affordable</span>
                <span class="lbl bottom">Expensive</span>
                <span class="lbl left">Generic</span>
                <span class="lbl right">Healthcare-specialised</span>
                <div class="dot" style="left:28%;top:70%"><span>Freelancers</span></div>
                <div class="dot" style="left:34%;top:32%"><span>DIY tools</span></div>
                <div class="dot" style="left:70%;top:74%"><span>Big agencies</span></div>
                <div class="us-ring" style="left:76%;top:26%"></div>
                <div class="dot us" style="left:76%;top:26%"><span>PMS</span></div>
            </div>
        </div>
    </section>

    <!-- ================= PROCESS ================= -->
    <section class="section">
        <div class="wrap">
            <div class="section-head center reveal">
                <span class="hand hand-note">How the marketplace works -</span>
                <h2>How it works</h2>
            </div>
            <div class="proc-grid">
                <div class="proc reveal">
                    <div class="n">1</div>
                    <h3>Join free</h3>
                    <p>Register with your name, specialty and clinic city. Takes 3 minutes, no cost.</p>
                </div>
                <div class="proc reveal">
                    <div class="n">2</div>
                    <h3>Get your profile</h3>
                    <p>Our team verifies you and lists your profile in the community directory.</p>
                </div>
                <div class="proc reveal">
                    <div class="n">3</div>
                    <h3>Pick your services</h3>
                    <p>Browse the marketplace and choose the marketing services or plan you need.</p>
                </div>
                <div class="proc reveal">
                    <div class="n">4</div>
                    <h3>Grow together</h3>
                    <p>We run it, you see patients - with member-only pricing and simple reports.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ================= DOCTORS DIRECTORY ================= -->
    <section class="section" id="doctors" x-data="{
        active: 'All',
        doctors: [
            { name: 'Dr. Rajesh Sharma', spec: 'Orthopedic', city: 'Jaipur', color: '#2447B2', init: 'RS', exp: '12 yrs', rating: '4.9' },
            { name: 'Dr. Anita Patel', spec: 'Dentist', city: 'Ahmedabad', color: '#0F8A73', init: 'AP', exp: '8 yrs', rating: '4.8' },
            { name: 'Dr. Neha Kulkarni', spec: 'Physiotherapist', city: 'Pune', color: '#D93B4A', init: 'NK', exp: '6 yrs', rating: '5.0' },
            { name: 'Dr. Sanjay Mehta', spec: 'Orthopedic', city: 'Indore', color: '#7A5AF8', init: 'SM', exp: '15 yrs', rating: '4.7' },
            { name: 'Dr. Priya Verma', spec: 'Dentist', city: 'Lucknow', color: '#E07B2A', init: 'PV', exp: '9 yrs', rating: '4.9' },
            { name: 'Dr. Amit Singh', spec: 'Physiotherapist', city: 'Delhi', color: '#0F8A73', init: 'AS', exp: '7 yrs', rating: '4.8' },
            { name: 'Dr. Kavita Rao', spec: 'Gynecologist', city: 'Hyderabad', color: '#2447B2', init: 'KR', exp: '14 yrs', rating: '5.0' },
            { name: 'Dr. Rohit Bansal', spec: 'Dermatologist', city: 'Chandigarh', color: '#D93B4A', init: 'RB', exp: '10 yrs', rating: '4.9' }
        ],
        cats: ['All', 'Orthopedic', 'Dentist', 'Physiotherapist', 'Gynecologist', 'Dermatologist'],
        get filtered() { return this.active === 'All' ? this.doctors : this.doctors.filter(d => d.spec === this.active) }
    }">
        <div class="wrap">
            <div class="section-head reveal">
                <span class="hand hand-note">Meet the community -</span>
                <h2>Doctors in our community</h2>
                <p>Browse community members specialty by specialty. Every profile is verified before it joins the
                    marketplace.</p>
            </div>
            <div class="filter-row" role="tablist" aria-label="Filter doctors by specialty">
                <template x-for="c in cats" :key="c">
                    <button class="filter-btn" :class="{ active: active === c }" @click="active=c" x-text="c"
                        role="tab" :aria-selected="active === c"></button>
                </template>
            </div>
            <div class="doc-grid">
                <template x-for="d in filtered" :key="d.name">
                    <div class="doc-card">
                        <span class="doc-verified">✓ Verified</span>
                        <div class="doc-head">
                            <div class="doc-av" :style="'background:' + d.color" x-text="d.init"></div>
                            <div class="doc-id">
                                <h3 x-text="d.name"></h3>
                                <div class="spec" x-text="d.spec"></div>
                            </div>
                        </div>
                        <div class="doc-meta">
                            <span class="mi star">★ <b x-text="d.rating"></b></span>
                            <span class="mi"><b x-text="d.exp"></b></span>
                            <span class="mi">📍 <span x-text="d.city"></span></span>
                        </div>
                        <a href="#" class="doc-view">View Profile →</a>
                    </div>
                </template>
                <p class="empty-note" x-show="filtered.length===0">No doctors in this category yet - be the first to
                    register!</p>
            </div>
        </div>
    </section>

    <!-- ================= TESTIMONIALS ================= -->
    <section class="section testi-sec">
        <div class="wrap">
            <div class="section-head center reveal">
                <span class="hand hand-note">Straight from the clinic -</span>
                <h2>Doctors on working with us</h2>
            </div>
            <div class="testi-grid">
                <div class="testi reveal">
                    <div class="q">“</div>
                    <div class="stars">★★★★★</div>
                    <p>My new patient calls almost doubled in four months. The WhatsApp reminders alone cut my no-shows
                        dramatically.</p>
                    <div class="who">
                        <div class="av" style="background:#2447B2">RS</div>
                        <div>
                            <div class="nm">Dr. Rajesh Sharma</div>
                            <div class="cl">Orthopedic · Jaipur</div>
                        </div>
                    </div>
                </div>
                <div class="testi reveal">
                    <div class="q">“</div>
                    <div class="stars">★★★★★</div>
                    <p>Finally an agency that gets healthcare. They knew exactly what a dental patient looks for before
                        I explained anything.</p>
                    <div class="who">
                        <div class="av" style="background:#0F8A73">AP</div>
                        <div>
                            <div class="nm">Dr. Anita Patel</div>
                            <div class="cl">Dentist · Ahmedabad</div>
                        </div>
                    </div>
                </div>
                <div class="testi reveal">
                    <div class="q">“</div>
                    <div class="stars">★★★★★</div>
                    <p>My Google rating went from 3.8 to 4.9 and the map ranking put me on top for physiotherapy in my
                        area.</p>
                    <div class="who">
                        <div class="av" style="background:#D93B4A">NK</div>
                        <div>
                            <div class="nm">Dr. Neha Kulkarni</div>
                            <div class="cl">Physiotherapist · Pune</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ================= DOCTORS MOSAIC ================= -->
    <section class="section mosaic-sec">
        <div class="wrap">
            <div class="mosaic reveal" aria-hidden="true">
                <div class="mtile" style="background:rgba(255,255,255,.14)"></div>
                <div class="mtile ph" style="background:#0F8A73">AP</div>
                <div class="mtile" style="background:rgba(255,255,255,.1)"></div>
                <div class="mtile ph" style="background:#D93B4A">NK</div>
                <div class="mtile" style="background:var(--marker)"></div>
                <div class="mtile ph" style="background:#7A5AF8">SM</div>
                <div class="mtile" style="background:rgba(255,255,255,.14)"></div>
                <div class="mtile ph" style="background:#E07B2A">PV</div>
                <div class="mtile" style="background:rgba(255,255,255,.1)"></div>
                <div class="mtile ph" style="background:#0EA5A5">AS</div>
                <div class="mtile" style="background:var(--rx)"></div>
                <div class="mtile ph" style="background:#2447B2">KR</div>
                <div class="mtile ph" style="background:#D93B4A">RB</div>
                <div class="mtile" style="background:rgba(255,255,255,.12)"></div>
                <div class="mtile ph" style="background:#2447B2">RS</div>
                <div class="mtile" style="background:var(--marker)"></div>
                <div class="mtile ph" style="background:#0F8A73">MD</div>
                <div class="mtile" style="background:rgba(255,255,255,.1)"></div>
                <div class="mtile ph" style="background:#7A5AF8">JT</div>
                <div class="mtile" style="background:rgba(255,255,255,.14)"></div>
                <div class="mtile ph" style="background:#E07B2A">SG</div>
                <div class="mtile" style="background:var(--rx)"></div>
                <div class="mtile ph" style="background:#0EA5A5">VK</div>
                <div class="mtile" style="background:rgba(255,255,255,.12)"></div>
            </div>
            <span class="hand">happy &amp; booked</span>
            <h2>Join 120+ doctors</h2>
            <p>growing together in one community - while they focus on patients.</p>
        </div>
    </section>

    <!-- ================= FAQ ================= -->
    <section class="section faq-sec" id="faq" x-data="{ open: 0 }">
        <div class="wrap">
            <div class="section-head center reveal">
                <span class="hand hand-note">Before you register -</span>
                <h2>Common questions</h2>
            </div>
            <div class="faq-wrap">
                <template
                    x-for="(f,i) in [
        {q:'Is registration really free?', a:'Yes. Creating your profile and getting listed in the directory is completely free. You only pay when you choose a growth plan.'},
        {q:'Which specialties do you work with?', a:'Any clinical specialty - we work heavily with orthopedics, dentistry and physiotherapy, plus gynecology, dermatology, pediatrics and general physicians.'},
        {q:'Do I need a website already?', a:'No. If you don’t have one, building a fast, patient-friendly website is part of what we do. If you do, we can improve and market the existing one.'},
        {q:'Is there a long-term contract?', a:'No lock-in. Plans are month-to-month. You continue because the results are worth it, not because a contract forces you.'},
        {q:'How soon will I see results?', a:'Setup and your first campaigns usually go live within a week. Meaningful growth in enquiries typically shows over the first 2–3 months.'}
      ]"
                    :key="i">
                    <div class="faq">
                        <button @click="open = open===i ? null : i" :aria-expanded="open === i">
                            <span x-text="f.q"></span>
                            <span class="ic" x-text="open===i ? '−' : '+'"></span>
                        </button>
                        <div class="ans" x-show="open===i" x-collapse>
                            <p x-text="f.a"></p>
                        </div>
                    </div>
                </template>
            </div>
        </div>
    </section>

    <!-- ================= REGISTER CTA ================= -->
    <section class="section register" id="register">
        <div class="wrap">
            <div class="reveal">
                <span class="hand">No waiting room here, doctor.</span>
                <h2>Join the community in 3 minutes</h2>
                <p>Become a member of India’s growing doctor community. Free listing, a verified profile in the
                    marketplace, and access to every marketing service - pick what you need.</p>
                <a href="#register-form" class="btn btn-red btn-lg">Join the Community - Free →</a>
            </div>
            <div class="steps reveal">
                <div class="step">
                    <div class="n">1</div>
                    <p>Fill your basic details - name, specialty, clinic city.</p>
                </div>
                <div class="step">
                    <div class="n">2</div>
                    <p>Our team verifies your registration &amp; creates your profile.</p>
                </div>
                <div class="step">
                    <div class="n">3</div>
                    <p>Go live in the directory + get your custom growth prescription.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ================= REGISTRATION FORM (prescription pad) ================= -->
    <section class="section reg-form-sec" id="register-form" x-data="{
        f: { name: '', spec: '', clinic: '', city: '', phone: '', email: '', exp: '', notes: '' },
        services: ['Website', 'WhatsApp', 'Social Media', 'Local SEO', 'Paid Ads', 'Reviews'],
        picked: [],
        consent: false,
        errors: {},
        done: false,
        toggle(s) { this.picked.includes(s) ? this.picked = this.picked.filter(x => x !== s) : this.picked.push(s) },
        submit() {
            this.errors = {};
            if (!this.f.name.trim()) this.errors.name = true;
            if (!this.f.spec) this.errors.spec = true;
            if (!this.f.city.trim()) this.errors.city = true;
            if (!/^[0-9+\-\s]{8,}$/.test(this.f.phone)) this.errors.phone = true;
            if (!this.consent) this.errors.consent = true;
            if (Object.keys(this.errors).length === 0) { this.done = true;
                window.scrollTo({ top: document.getElementById('register-form').offsetTop - 40, behavior: 'smooth' }); }
        }
    }">
        <span class="spark" style="top:12%;left:8%">✦</span>
        <span class="spark r" style="top:20%;right:10%">✱</span>
        <span class="spark t" style="bottom:14%;left:14%">✧</span>
        <div class="wrap">
            <div class="section-head center reveal">
                <span class="hand hand-note">Fill it like a prescription -</span>
                <h2>Doctor registration</h2>
                <p>Free to join. Takes 3 minutes. Our team reviews every entry before it goes live.</p>
            </div>

            <div class="reg-pad reveal">
                <div class="pad-head">
                    <div class="ph-title">PMS Registration<small>Growth Clinic for Doctors · New Patient... we mean,
                            New Doctor</small></div>
                    <div class="rx-big">℞</div>
                </div>

                <div class="pad-body">
                    <!-- FORM -->
                    <div class="reg-inner" x-show="!done">
                        <div class="reg-grid">
                            <div class="reg-field full" :class="{ err: errors.name }">
                                <label>Full Name <span class="rq">*</span> <span class="hint">- e.g. Dr. Rajesh
                                        Sharma</span></label>
                                <input type="text" x-model="f.name" placeholder="Dr. Your Name">
                                <span class="msg">Please enter your name</span>
                            </div>

                            <div class="reg-field" :class="{ err: errors.spec }">
                                <label>Specialty <span class="rq">*</span></label>
                                <select x-model="f.spec">
                                    <option value="">Select specialty…</option>
                                    <option>Orthopedic</option>
                                    <option>Dentist</option>
                                    <option>Physiotherapist</option>
                                    <option>Gynecologist</option>
                                    <option>Dermatologist</option>
                                    <option>Pediatrician</option>
                                    <option>General Physician</option>
                                    <option>Other</option>
                                </select>
                                <span class="msg">Please choose a specialty</span>
                            </div>

                            <div class="reg-field">
                                <label>Years of Experience</label>
                                <input type="text" x-model="f.exp" placeholder="e.g. 8 years">
                            </div>

                            <div class="reg-field">
                                <label>Clinic / Hospital Name</label>
                                <input type="text" x-model="f.clinic" placeholder="e.g. Sharma Ortho Clinic">
                            </div>

                            <div class="reg-field" :class="{ err: errors.city }">
                                <label>Clinic City <span class="rq">*</span></label>
                                <input type="text" x-model="f.city" placeholder="e.g. Jaipur">
                                <span class="msg">Please enter your city</span>
                            </div>

                            <div class="reg-field" :class="{ err: errors.phone }">
                                <label>WhatsApp Number <span class="rq">*</span></label>
                                <input type="tel" x-model="f.phone" placeholder="+91 90000 00000">
                                <span class="msg">Enter a valid phone number</span>
                            </div>

                            <div class="reg-field">
                                <label>Email</label>
                                <input type="email" x-model="f.email" placeholder="you@clinic.com">
                            </div>
                        </div>

                        <div class="reg-sub">Services you're interested in</div>
                        <div class="svc-picker">
                            <template x-for="s in services" :key="s">
                                <span class="svc-pick" :class="{ on: picked.includes(s) }" @click="toggle(s)">
                                    <span class="tk" x-text="picked.includes(s) ? '✓' : ''"></span>
                                    <span x-text="s"></span>
                                </span>
                            </template>
                        </div>

                        <div class="reg-field full" style="margin-top:20px">
                            <label>Anything else? <span class="hint">- goals, current website,
                                    questions</span></label>
                            <textarea x-model="f.notes" placeholder="Tell us a little about your practice and what you'd like to grow…"></textarea>
                        </div>

                        <label class="reg-consent" :style="errors.consent ? 'color:var(--rx)' : ''">
                            <input type="checkbox" x-model="consent">
                            <span>I agree to be contacted by PMS about my registration and a growth plan. No spam,
                                promise.</span>
                        </label>

                        <div class="reg-footer">
                            <div class="reg-sign">
                                <div class="line"><span class="sig" x-text="f.name || ''"></span></div>
                                <small>Doctor's signature</small>
                            </div>
                            <button class="btn btn-red btn-lg reg-submit" @click="submit()">Submit Registration
                                ℞</button>
                        </div>
                    </div>

                    <!-- SUCCESS -->
                    <div class="reg-success" x-show="done" x-cloak>
                        <div class="tick-big">✓</div>
                        <h3>Registration received, <span x-text="f.name || 'Doctor'"></span>!</h3>
                        <p>Our team will verify your details and reach out on WhatsApp within 24 hours with your profile
                            link and a growth prescription for your specialty.</p>
                        <div class="stamp">Prescription filed ✓</div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- ================= FINAL CTA ================= -->
    <section class="section final">
        <span class="spark" style="top:22%;left:12%">✦</span>
        <span class="spark r" style="top:32%;right:14%">✱</span>
        <span class="spark t" style="bottom:26%;left:20%">✦</span>
        <span class="spark" style="bottom:20%;right:22%">✧</span>
        <span class="spark r" style="top:16%;left:44%">✧</span>
        <div class="wrap">
            <span class="hand">Ready when you are, doctor.</span>
            <h2>Let’s write your <span class="hl">growth prescription</span></h2>
            <div class="cta-row">
                <a href="#register-form" class="btn btn-red btn-lg">Register Your Practice →</a>
                <a href="#doctors" class="btn btn-ghost btn-lg">Browse Doctors</a>
            </div>
            <p class="sub">Free to register · No lock-in · Built only for doctors</p>
        </div>
    </section>

    <!-- ================= FOOTER ================= -->
    <footer class="footer">
        <div class="wrap">
            <a href="index.php" class="logo"><img src="{{ Vite::asset(config('constants.company_logo')) }}"
                    alt="PMS" class="logo-img" style="height:32px"></a>
            <div class="links">
                <a href="#services">Services</a>
                <a href="#online">Practice Online</a>
                <a href="#doctors">Doctors</a>
                <a href="#register-form">Register</a>
                <a href="#faq">FAQ</a>
                <a href="contact.php">Contact</a>
            </div>
            <p class="small">© 2026 PMS. Marketing, prescribed for doctors.</p>
        </div>
    </footer>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

    <script>
        // scroll reveal
        const io = new IntersectionObserver((entries) => {
            entries.forEach(e => {
                if (e.isIntersecting) {
                    e.target.classList.add('in');
                    io.unobserve(e.target);
                }
            });
        }, {
            threshold: .12
        });
        document.querySelectorAll('.reveal').forEach(el => io.observe(el));

        // count-up animation for stats
        const counters = document.querySelectorAll('.stat .n');
        const cio = new IntersectionObserver((entries) => {
            entries.forEach(e => {
                if (!e.isIntersecting) return;
                cio.unobserve(e.target);
                const el = e.target;
                const raw = el.textContent.trim();
                const match = raw.match(/^([\d.]+)([Kk]?)/);
                if (!match) return;
                const target = parseFloat(match[1]);
                const suffix = el.querySelector('.plus') ? el.querySelector('.plus').textContent : '';
                const kay = match[2] ? 'K' : '';
                const isFloat = match[1].includes('.');
                let start = null;

                function step(ts) {
                    if (!start) start = ts;
                    const p = Math.min((ts - start) / 1200, 1);
                    const eased = 1 - Math.pow(1 - p, 3);
                    const val = isFloat ? (target * eased).toFixed(1) : Math.round(target * eased);
                    el.innerHTML = val + kay + '<span class="plus">' + suffix + '</span>';
                    if (p < 1) requestAnimationFrame(step);
                }
                requestAnimationFrame(step);
            });
        }, {
            threshold: .5
        });
        counters.forEach(el => cio.observe(el));
    </script>
</body>

</html>
