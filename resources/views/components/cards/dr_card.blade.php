@props([
    'landingPage' => null,
    'name' => null,
    'role' => null,
    'brand' => null,
    'image' => null,
    'tags' => null,
    'profileUrl' => null,
    'whatsappNumber' => null,
    'shareUrl' => null,
    'backTitle' => null,
    'backSub' => null,
])

@php
    $brand = $brand ?? 'Doctor<span>Shah</span>';
    $primaryDoctor = ($landingPage && isset($landingPage->doctors) && count($landingPage->doctors) > 0) ? $landingPage->doctors->first() : null;
    $name = $name ?? ($landingPage->clinic_name ?? ($primaryDoctor?->doctor_name ?? 'Simran Kaur'));

    if (!isset($role)) {
        if ($primaryDoctor) {
            $docPart = $primaryDoctor->doctor_name;
            if (!empty($primaryDoctor->specialization)) {
                $cleanSpec = trim(\Illuminate\Support\Str::before($primaryDoctor->specialization, '('));
                $docPart .= ' • ' . ($cleanSpec ?: $primaryDoctor->specialization);
            }
            $role = $docPart;
        } elseif ($landingPage) {
            $role = 'Multi-Speciality Clinic';
        } else {
            $role = 'Advocate';
        }
    }

    if (!isset($image)) {
        if ($landingPage && !empty($landingPage->logo)) {
            $image = asset('landing-page-logos/' . $landingPage->logo);
        } elseif ($primaryDoctor && !empty($primaryDoctor->photo)) {
            $image = asset('landing-page-doctors/' . $primaryDoctor->photo);
        } else {
            $image = null;
        }
    }

    if (!isset($tags) || empty($tags)) {
        if ($landingPage && !empty($landingPage->services)) {
            $raw = preg_replace('/<\s*(?:br|p|li)[^>]*>/i', "\n", $landingPage->services);
            $clean = strip_tags(html_entity_decode($raw, ENT_QUOTES | ENT_HTML5, 'UTF-8'));
            $lines = array_filter(array_map('trim', preg_split('/[\r\n,]+/', $clean)));
            $formattedTags = [];
            foreach ($lines as $line) {
                if (count($formattedTags) >= 3) break;
                $formattedTags[] = \Illuminate\Support\Str::limit($line, 16, '');
            }
            $tags = !empty($formattedTags) ? $formattedTags : ['Healthcare', 'Consultation', 'Care'];
        } else {
            $tags = ['Civil', 'Criminal', 'Family'];
        }
    } elseif (is_string($tags)) {
        $tags = array_values(array_filter(array_map('trim', explode(',', $tags))));
    }

    $profileUrl = $profileUrl ?? ($landingPage && !empty($landingPage->slug) ? url('/lp/' . $landingPage->slug) : '#');
    $whatsappNumber = $whatsappNumber ?? ($landingPage->whatsapp_number ?? '');
    $shareUrl = $shareUrl ?? ('https://api.whatsapp.com/send?text=' . rawurlencode('Check out ' . $name . ': ' . $profileUrl));
    $backTitle = $backTitle ?? 'Connect with me';
    $backSub = $backSub ?? 'Scan to view my profile and services.';
@endphp

@once
  <style>
      :root {
          --navy-1: #0f2a4a;
          --navy-2: #0a1d36;
          --gold: #c9a44c;
          --ink: #0f2a4a;
          --paper: #ffffff;
          --muted: #6b7686;
      }

      .card-wrap {
          perspective: 1600px;
          width: 250px;
          height: 395px;
          position: relative;
      }

      /* Fix Bootstrap .card border & white background leaking behind the 3D card */
      .card-wrap .card {
          position: relative;
          width: 100%;
          height: 100%;
          display: block !important;
          transform-style: preserve-3d;
          transition: transform .7s cubic-bezier(.4, .2, .2, 1);
          background: transparent !important;
          border: none !important;
          border-radius: 18px !important;
          box-shadow: none !important;
          padding: 0 !important;
          margin: 0 !important;
          overflow: visible !important;
      }

      .card-wrap:hover .card,
      .card-wrap:focus-within .card {
          transform: rotateY(180deg);
      }

      .face {
          position: absolute;
          inset: 0;
          border-radius: 18px;
          backface-visibility: hidden;
          -webkit-backface-visibility: hidden;
          display: flex;
          flex-direction: column;
          overflow: hidden;
          box-shadow: 0 18px 40px -12px rgba(15, 42, 74, .35);
      }

      /* ---------- FRONT (dark) ---------- */
      .front {
          background: linear-gradient(160deg, var(--navy-1), var(--navy-2) 70%);
          color: #fff;
          padding: 24px 18px;
          align-items: flex-start;
      }

      .brand {
          font-size: 17px;
          font-weight: 700;
          letter-spacing: .2px;
      }

      .brand span {
          color: var(--gold);
      }

      .avatar {
          margin: 36px auto 18px;
          width: 78px;
          height: 78px;
          border-radius: 50%;
          border: 1.5px solid rgba(255, 255, 255, .55);
          display: flex;
          align-items: center;
          justify-content: center;
          overflow: hidden;
          background: rgba(255, 255, 255, .05);
      }

      .avatar img {
          width: 100%;
          height: 100%;
          object-fit: cover;
          border-radius: 50%;
      }

      .avatar svg {
          width: 34px;
          height: 34px;
          stroke: #fff;
      }

      .front-name {
          width: 100%;
          text-align: center;
          font-size: 18px;
          font-weight: 600;
          margin-top: 4px;
          white-space: nowrap;
          overflow: hidden;
          text-overflow: ellipsis;
          padding: 0 4px;
      }

      .front-role {
          width: 100%;
          text-align: center;
          font-size: 12.5px;
          color: #b9c6da;
          margin-top: 2px;
          white-space: nowrap;
          overflow: hidden;
          text-overflow: ellipsis;
          padding: 0 4px;
      }

      .front-tags {
          width: 100%;
          display: flex;
          justify-content: center;
          gap: 10px;
          margin-top: 22px;
          font-size: 11px;
          color: #cfd9e8;
          flex-wrap: wrap;
          padding: 0 4px;
      }

      .front-tags span {
          display: flex;
          align-items: center;
          gap: 4px;
      }

      .dot {
          width: 5px;
          height: 5px;
          border-radius: 50%;
          background: var(--gold);
          display: inline-block;
      }

      /* ---------- BACK (light) ---------- */
      .back {
          background: var(--paper);
          color: var(--ink);
          transform: rotateY(180deg);
          align-items: center;
          justify-content: center;
          padding: 28px 24px;
          gap: 14px;
          border: 1px solid #eceff3;
      }

      .qr {
          width: 100px;
          height: 100px;
          border-radius: 10px;
          background:
              repeating-linear-gradient(90deg, #111 0 6px, transparent 6px 12px) 0 0/100% 12px,
              repeating-linear-gradient(0deg, #111 0 6px, transparent 6px 12px) 0 0/12px 100%;
          background-color: #fff;
          outline: 8px solid #fff;
          box-shadow: 0 0 0 1px #eee;
          display: flex;
          align-items: center;
          justify-content: center;
          overflow: hidden;
      }

      .qr img {
          width: 100%;
          height: 100%;
          object-fit: contain;
      }

      .back-title {
          font-size: 16px;
          font-weight: 700;
          margin-top: 6px;
      }

      .back-sub {
          font-size: 12px;
          color: var(--muted);
          text-align: center;
          line-height: 1.4;
          max-width: 190px;
      }

      .card-wrap .card-btn {
          width: 100%;
          max-width: 200px;
          text-align: center;
          padding: 11px 14px;
          border-radius: 24px;
          font-size: 13px;
          font-weight: 600;
          text-decoration: none;
          display: inline-flex;
          align-items: center;
          justify-content: center;
          gap: 6px;
      }

      .card-wrap .card-btn-outline {
          border: 1.4px solid var(--navy-1);
          color: var(--navy-1);
          background: transparent;
      }

      .card-wrap .card-btn-solid {
          background: var(--navy-1);
          color: #fff;
          border: 1.4px solid var(--navy-1);
      }

      .card-wrap .card-btn:hover {
          opacity: .85;
      }

      .card-wrap:focus-visible {
          outline: 3px solid var(--gold);
          outline-offset: 4px;
          border-radius: 18px;
      }
  </style>
@endonce

  <div class="card-wrap" tabindex="0">
      <div class="card" aria-label="{{ $name }} profile card — hover to flip">

          <div class="face front">
              <div class="brand">{!! $brand !!}</div>
              <div class="avatar">
                  @if(!empty($image))
                      <img src="{{ $image }}" alt="{{ $name }}">
                  @else
                      <svg viewBox="0 0 24 24" fill="none" stroke-width="1.6" stroke-linecap="round"
                          stroke-linejoin="round">
                          <circle cx="12" cy="8" r="4"></circle>
                          <path d="M4 21c0-4.4 3.6-8 8-8s8 3.6 8 8"></path>
                      </svg>
                  @endif
              </div>
              <div class="front-name" title="{{ $name }}">{{ $name }}</div>
              <div class="front-role" title="{{ $role }}">{{ $role }}</div>
              <div class="front-tags">
                  @foreach($tags as $tag)
                      <span><i class="dot"></i>{{ $tag }}</span>
                  @endforeach
              </div>
          </div>

          <div class="face back">
              <div class="qr" role="img" aria-label="QR code to profile">
                  <img src="https://api.qrserver.com/v1/create-qr-code/?size=100x100&data={{ rawurlencode($profileUrl) }}" alt="QR Code" loading="lazy">
              </div>
              <div class="back-title">{{ $backTitle }}</div>
              <div class="back-sub">{{ $backSub }}</div>
              <a class="card-btn card-btn-outline" href="{{ $shareUrl }}" target="_blank" rel="noopener">
                  <svg viewBox="0 0 24 24" width="16" height="16" fill="currentColor" style="display:inline-block;vertical-align:middle;margin-right:2px;">
                      <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"/>
                  </svg> Share
              </a>
              <a class="card-btn card-btn-solid" href="{{ $profileUrl }}" target="_blank"
                  rel="noopener">Visit Profile</a>
          </div>

      </div>
  </div>

