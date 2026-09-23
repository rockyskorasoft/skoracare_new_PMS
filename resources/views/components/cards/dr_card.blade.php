  <style>
      :root {
          --navy-1: #0f2a4a;
          --navy-2: #0a1d36;
          --gold: #c9a44c;
          --ink: #0f2a4a;
          --paper: #ffffff;
          --muted: #6b7686;
          box-sizing: border-box;
          padding-top: env(safe-area-inset-top, 0px);
          padding-bottom: env(safe-area-inset-bottom, 0px);
      }

      .card-wrap {
          perspective: 1600px;
          width: 260px;
          height: 400px;
      }

      .card {
          position: relative;
          width: 100%;
          height: 100%;
          display: block;
          transform-style: preserve-3d;
          transition: transform .7s cubic-bezier(.4, .2, .2, 1);
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
          display: flex;
          flex-direction: column;
          overflow: hidden;
          box-shadow: 0 18px 40px -12px rgba(15, 42, 74, .35);
      }

      /* ---------- FRONT (dark) ---------- */
      .front {
          background: linear-gradient(160deg, var(--navy-1), var(--navy-2) 70%);
          color: #fff;
          padding: 26px 22px;
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
      }

      .front-role {
          width: 100%;
          text-align: center;
          font-size: 12.5px;
          color: #b9c6da;
          margin-top: 2px;
      }

      .front-tags {
          width: 100%;
          display: flex;
          justify-content: center;
          gap: 14px;
          margin-top: 22px;
          font-size: 11px;
          color: #cfd9e8;
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

      .front-curve {
          margin-top: auto;
          height: 46px;
          background: linear-gradient(90deg, var(--gold), #f1d98a);
          opacity: .9;
          clip-path: ellipse(70% 100% at 30% 100%);
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

      .btn {
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

      .btn-outline {
          border: 1.4px solid var(--navy-1);
          color: var(--navy-1);
          background: transparent;
      }

      .btn-solid {
          background: var(--navy-1);
          color: #fff;
          border: 1.4px solid var(--navy-1);
      }

      .btn:hover {
          opacity: .85;
      }

      .card-wrap:focus-visible {
          outline: 3px solid var(--gold);
          outline-offset: 4px;
          border-radius: 18px;
      }
  </style>

  <div class="card-wrap" tabindex="0">
      <div class="card" aria-label="Simran Kaur profile card — hover to flip">

          <div class="face front">
              <div class="brand">Doctor<span>Shah</span></div>
              <div class="avatar">
                  <svg viewBox="0 0 24 24" fill="none" stroke-width="1.6" stroke-linecap="round"
                      stroke-linejoin="round">
                      <circle cx="12" cy="8" r="4"></circle>
                      <path d="M4 21c0-4.4 3.6-8 8-8s8 3.6 8 8"></path>
                  </svg>
              </div>
              <div class="front-name">Simran Kaur</div>
              <div class="front-role">Advocate</div>
              <div class="front-tags">
                  <span><i class="dot"></i>Civil</span>
                  <span><i class="dot"></i>Criminal</span>
                  <span><i class="dot"></i>Family</span>
              </div>
              <div class="front-curve"></div>
          </div>

          <div class="face back">
              <div class="qr" role="img" aria-label="QR code to profile"></div>
              <div class="back-title">Connect with me</div>
              <div class="back-sub">Scan to view my profile and services.</div>
              <a class="btn btn-outline" href="/assets/simran-kaur-card.vcf" download>⬇ Download Card</a>
              <a class="btn btn-solid" href="https://legalshah.com/profile/simran-kaur" target="_blank"
                  rel="noopener">Visit Profile</a>
          </div>

      </div>
  </div>
