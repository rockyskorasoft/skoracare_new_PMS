@extends('layouts.app')
@section('title')
    Edit Package
@endsection
@section('content')
    <div class="d-flex gap-2 align-items-center justify-content-between mb-4 pb-2">
        <h3 class="page-title">Edit Subscription Package</h3>
        <a href="{{ route('admin.packages.index') }}" class="btn btn-outline-secondary btn-sm custom-cancell">
            <i class="bi bi-arrow-left me-1"></i>{{ __('buttons.back') }}
        </a>
    </div>

    <div class="col-md-12 divide-y-1 dashboard-card-main-col">
        <div class="card no-scale">
            <div class="card-body">
                @if (session('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('error') }}
                    </div>
                @endif
                <form class="row g-3" action="{{ route('admin.packages.update', ['package' => \App\Support\SecureRouteParameter::encode($package->id)]) }}" method="post">
                    @csrf
                    @method('PUT')

                    {{-- Package Basic Information --}}
                    <div class="role-section-header mb-3">
                        <span class="role-section-icon"><i class="fa-solid fa-box-open"></i></span>
                        <span>Package Information</span>
                    </div>
                    
                    <x-input-field class="col-md-6" label="Package Name" name="name" id="name"
                        type="text" :value="old('name', $package->name)" placeholder="e.g. Package 1, Gold, Platinum"
                        errorField="name" labelClass="required" />

                    <x-select-field class="col-md-6" label="Status" name="status" id="status"
                        :options="[['id' => 'active', 'label' => 'Active'], ['id' => 'inactive', 'label' => 'Inactive']]" 
                        :value="old('status', $package->status)" placeholder="{{ __('labels.select') }}"
                        errorField="status" labelClass="required" />

                    <x-input-field class="col-md-6" label="Monthly Price (₹)" name="monthly_price" id="monthly_price"
                        type="number" step="0.01" :value="old('monthly_price', $package->monthly_price)" placeholder="790.00"
                        errorField="monthly_price" labelClass="required" />

                    <x-input-field class="col-md-6" label="Yearly Price (₹)" name="yearly_price" id="yearly_price"
                        type="number" step="0.01" :value="old('yearly_price', $package->yearly_price)" placeholder="7890.00"
                        errorField="yearly_price" labelClass="required" />

                    <x-input-field class="col-md-6" label="Clinic Limit" name="clinic_limit" id="clinic_limit"
                        type="number" :value="old('clinic_limit', $package->clinic_limit)" placeholder="-1 for Unlimited"
                        errorField="clinic_limit" labelClass="required" />

                    <x-input-field class="col-md-6" label="User / Staff Limit" name="user_limit" id="user_limit"
                        type="number" :value="old('user_limit', $package->user_limit)" placeholder="-1 for Unlimited"
                        errorField="user_limit" labelClass="required" />

                    <div class="col-md-12">
                        <div class="form-check form-switch mt-2">
                            <input class="form-check-input" type="checkbox" name="is_popular" value="1" id="is_popular" {{ old('is_popular', $package->is_popular) ? 'checked' : '' }}>
                            <label class="form-check-label fw-bold text-success" for="is_popular">
                                <i class="fa-solid fa-star me-1"></i>Mark as "Most Popular" Plan
                            </label>
                        </div>
                    </div>

                    <x-text-area-field
                        divClass="col-md-12"
                        label="Description / Tagline"
                        name="description"
                        id="description"
                        rows="3"
                        :value="old('description', $package->description)"
                    />

                    {{-- Package Marketing Features Repeater --}}
                    <div class="role-section-header my-3">
                        <span class="role-section-icon"><i class="fa-solid fa-list-check"></i></span>
                        <span>Package Features</span>
                    </div>

                    <div class="col-md-12">
                        <div class="card border shadow-none" style="background-color: #f8fafc;">
                            <div class="card-body p-3">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div>
                                        <h6 class="mb-0 fw-semibold text-dark">
                                            <i class="fa-solid fa-circle-check text-success me-1"></i>Package Feature Offerings
                                        </h6>
                                        <small class="text-muted">Features shown on pricing card (e.g. Doctor website + WhatsApp booking, Google Business & local SEO, 3 social posts / week).</small>
                                    </div>
                                    <button type="button" class="btn btn-primary btn-sm rounded-pill px-3" id="addFeatureBtn">
                                        <i class="fa-solid fa-plus me-1"></i> Add Feature
                                    </button>
                                </div>

                                @php
                                    $oldFeatures = old('features');
                                    if ($oldFeatures !== null) {
                                        $featureList = is_array($oldFeatures) ? $oldFeatures : [];
                                    } else {
                                        $featureList = $package->features->pluck('name')->toArray();
                                    }
                                    $validFeatures = array_filter($featureList, fn($f) => trim((string)$f) !== '');
                                @endphp

                                <div id="featuresContainer" class="d-flex flex-column gap-2">
                                    @forelse ($validFeatures as $featureVal)
                                        <div class="feature-item d-flex align-items-center gap-2 bg-white p-2 border rounded shadow-sm">
                                            <span class="text-success fs-5 px-1"><i class="fa-solid fa-circle-check"></i></span>
                                            <input type="text" name="features[]" class="form-control" list="featuresList" placeholder="e.g. Doctor website + WhatsApp booking" value="{{ $featureVal }}">
                                            <button type="button" class="btn btn-outline-danger btn-sm remove-feature-btn" title="Remove Feature">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </div>
                                    @empty
                                    @endforelse
                                </div>

                                <div id="noFeaturesMsg" class="text-center py-3 text-muted border border-dashed rounded bg-white mt-2" style="{{ count($validFeatures) > 0 ? 'display: none;' : '' }}">
                                    <i class="fa-solid fa-list-check mb-1 d-block fs-4 text-secondary"></i>
                                    <span>No features added yet. Click <strong>"Add Feature"</strong> to add bullet points for this package.</span>
                                </div>

                                @if(isset($allFeatures) && $allFeatures->count() > 0)
                                    <datalist id="featuresList">
                                        @foreach($allFeatures as $featName)
                                            <option value="{{ $featName }}"></option>
                                        @endforeach
                                    </datalist>
                                @endif
                            </div>
                        </div>
                    </div>

                    {{-- Package Permissions (Same exact tree layout as Roles) --}}
                    <div class="role-section-header my-3">
                        <span class="role-section-icon"><i class="fa-solid fa-lock"></i></span>
                        <span>Package Permissions & System Access</span>
                    </div>

                    <div class="col-md-12 mb-3">
                        {{-- Select All --}}
                        <div class="role-select-all-bar mb-3">
                            <div class="form-check d-flex align-items-center gap-2 mb-0">
                                <input type="checkbox" id="select-all" class="form-check-input mt-0">
                                <label for="select-all" class="form-check-label fw-semibold mb-0">
                                    {{ __('labels.select_all') }}
                                </label>
                            </div>
                        </div>

                        {{-- Category list --}}
                        <div id="category-checkboxes" class="d-flex flex-column gap-2">
                            @foreach ($permissions['children'] as $category)
                                @if ($category->parent_id === null)
                                    <div class="role-perm-category">
                                        {{-- Parent --}}
                                        <div class="role-perm-parent">
                                            <div class="form-check d-flex align-items-center gap-2 mb-0">
                                                <input type="checkbox" class="form-check-input mt-0 parent-checkbox"
                                                    id="parent-{{ $category->id }}" name="parents[]"
                                                    value="{{ $category->id }}"
                                                    {{ in_array($category->id, $packagePermissionIds) ? 'checked' : '' }}>
                                                <label class="form-check-label fw-semibold mb-0"
                                                    for="parent-{{ $category->id }}">
                                                    <i class="fa-solid fa-folder me-1 role-cat-icon"></i>
                                                    {{ ucwords(str_replace(['-', '_'], ' ', $category->name)) }}
                                                </label>
                                            </div>
                                        </div>

                                        {{-- Children --}}
                                        <div class="child-categories role-perm-children">
                                            @foreach ($category->children as $child)
                                                <div class="form-check d-flex align-items-center gap-2 mb-0">
                                                    <input type="checkbox"
                                                        class="form-check-input mt-0 child-checkbox"
                                                        id="child-{{ $child->id }}" name="children[]"
                                                        value="{{ $child->id }}"
                                                        data-parent-id="{{ $category->id }}"
                                                        {{ in_array($child->id, $packagePermissionIds) ? 'checked' : '' }}>
                                                    <label class="form-check-label mb-0"
                                                        for="child-{{ $child->id }}">
                                                        {{ ucwords(str_replace(['-', '_'], ' ', $child->name)) }}
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>

                    <div class="col-12 mt-4">
                        <a href="{{ route('admin.packages.index') }}" class="btn btn-secondary cancel-btn mt-2 mt-sm-0">
                            {{ __('labels.cancel') }}
                        </a>
                        <x-button type="submit" class="btn btn-primary" buttons="{{ __('buttons.update') }}" />
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const featuresContainer = document.getElementById('featuresContainer');
        const addFeatureBtn = document.getElementById('addFeatureBtn');
        const noFeaturesMsg = document.getElementById('noFeaturesMsg');

        function updateNoFeaturesMsg() {
            if (!featuresContainer || !noFeaturesMsg) return;
            const count = featuresContainer.querySelectorAll('.feature-item').length;
            noFeaturesMsg.style.display = count === 0 ? '' : 'none';
        }

        function createFeatureRow(val = '') {
            const row = document.createElement('div');
            row.className = 'feature-item d-flex align-items-center gap-2 bg-white p-2 border rounded shadow-sm';
            
            const safeVal = val.replace(/"/g, '&quot;');
            row.innerHTML = `
                <span class="text-success fs-5 px-1"><i class="fa-solid fa-circle-check"></i></span>
                <input type="text" name="features[]" class="form-control" list="featuresList" placeholder="e.g. Doctor website + WhatsApp booking" value="${safeVal}">
                <button type="button" class="btn btn-outline-danger btn-sm remove-feature-btn" title="Remove Feature">
                    <i class="fa-solid fa-trash"></i>
                </button>
            `;

            row.querySelector('.remove-feature-btn').addEventListener('click', function () {
                row.remove();
                updateNoFeaturesMsg();
            });

            return row;
        }

        if (addFeatureBtn) {
            addFeatureBtn.addEventListener('click', function () {
                const newRow = createFeatureRow();
                featuresContainer.appendChild(newRow);
                updateNoFeaturesMsg();
                const input = newRow.querySelector('input');
                if (input) input.focus();
            });
        }

        if (featuresContainer) {
            featuresContainer.querySelectorAll('.remove-feature-btn').forEach(function (btn) {
                btn.addEventListener('click', function () {
                    const row = btn.closest('.feature-item');
                    if (row) row.remove();
                    updateNoFeaturesMsg();
                });
            });
        }

        updateNoFeaturesMsg();
    });
</script>
@endpush
