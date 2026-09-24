@extends('layouts.app')
@section('title')
    {{ __('labels.show_page', ['action' => 'Doctor']) }}
@endsection
@section('content')
    @php
        $statusLabel = \App\Enums\CommonStatus::tryFrom($user->status)?->label() ?? 'N/A';
        $isActive = strtolower($statusLabel) === 'active';
        $initials = strtoupper(substr($user->first_name ?? 'D', 0, 1) . substr($user->last_name ?? '', 0, 1));
        $fullName = trim(($user->first_name ?? '') . ' ' . ($user->last_name ?? '')) ?: 'N/A';
    @endphp

    <div class="d-flex gap-2 align-items-center justify-content-between mb-4 pb-2">
        <h3 class="page-title">{{ __('labels.show_page', ['action' => 'Doctor']) }}</h3>
        <a href="{{ route('admin.doctors.index') }}" class="btn btn-outline-secondary btn-sm custom-cancell">
            <i class="bi bi-arrow-left me-1"></i>{{ __('buttons.back') }}
        </a>
    </div>

    <div class="show-detail-page">
        {{-- Header Card --}}
        <div class="detail-header-card">
            @if(!empty($user->profile_pic))
                <img src="{{ asset('storage/profile_images/' . $user->profile_pic) }}" alt="{{ $fullName }}" class="rounded-circle object-fit-cover border shadow-sm me-3" style="width: 72px; height: 72px;" onerror="this.style.display='none';this.nextElementSibling.style.display='flex';">
                <div class="detail-avatar" style="display:none;">{{ $initials }}</div>
            @else
                <div class="detail-avatar">{{ $initials }}</div>
            @endif
            <div class="detail-header-info">
                <h4 class="detail-title">{{ $fullName }}</h4>
                <p class="detail-subtitle mb-1">{{ $user->email }}</p>
                <div class="d-flex flex-wrap gap-1 mt-1">
                    @if($user->specialization)
                        <span class="badge bg-primary-subtle text-primary border border-primary-subtle">
                            <i class="fa-solid fa-user-doctor me-1"></i>{{ $user->specialization_label }}
                        </span>
                    @endif
                    @if($user->experience !== null && $user->experience !== '')
                        <span class="badge bg-info-subtle text-info border border-info-subtle">
                            <i class="fa-solid fa-briefcase me-1"></i>{{ $user->experience_text }}
                        </span>
                    @endif
                </div>
            </div>
            <div class="detail-header-badge">
                <span class="badge {{ $isActive ? 'bg-success' : 'bg-secondary' }}">
                    {{ $statusLabel }}
                </span>
            </div>
        </div>

        {{-- Doctor Details --}}
        <div class="detail-section">
            <p class="detail-section-title">Doctor Details</p>
            <div class="detail-grid">
                <div class="detail-item">
                    <div class="detail-label">First Name</div>
                    <div class="detail-value {{ !$user->first_name ? 'text-muted-val' : '' }}">
                        {{ $user->first_name ?? 'N/A' }}
                    </div>
                </div>
                <div class="detail-item">
                    <div class="detail-label">Last Name</div>
                    <div class="detail-value {{ !$user->last_name ? 'text-muted-val' : '' }}">
                        {{ $user->last_name ?? 'N/A' }}
                    </div>
                </div>
                <div class="detail-item">
                    <div class="detail-label">Email Address</div>
                    <div class="detail-value">{{ $user->email }}</div>
                </div>
                <div class="detail-item">
                    <div class="detail-label">Phone Number</div>
                    <div class="detail-value">{{ $user->phone_no ?? 'N/A' }}</div>
                </div>
                <div class="detail-item">
                    <div class="detail-label">Specialization</div>
                    <div class="detail-value">{{ $user->specialization_label }}</div>
                </div>
                <div class="detail-item">
                    <div class="detail-label">Experience</div>
                    <div class="detail-value">{{ $user->experience_text }}</div>
                </div>
                <div class="detail-item">
                    <div class="detail-label">Qualification</div>
                    <div class="detail-value">{{ $user->qualification ?? 'N/A' }}</div>
                </div>
                <div class="detail-item">
                    <div class="detail-label">Registration Number</div>
                    <div class="detail-value">{{ $user->registration_number ?? 'N/A' }}</div>
                </div>
                <div class="detail-item full-width">
                    <div class="detail-label">Address</div>
                    <div class="detail-value {{ !$user->address ? 'text-muted-val' : '' }}">
                        {!! $user->address ?? 'N/A' !!}
                    </div>
                </div>
                <div class="detail-item">
                    <div class="detail-label">Created At</div>
                    <div class="detail-value">{{ $user->created_at }}</div>
                </div>
                <div class="detail-item">
                    <div class="detail-label">Updated At</div>
                    <div class="detail-value">{{ $user->updated_at }}</div>
                </div>
            </div>
        </div>
    </div>
@endsection
