{{-- Confirm Appointment Side Drawer Overlay (Screenshot 5) --}}
<div class="confirm-drawer-backdrop" id="confirmBackdrop" onclick="closeConfirmDrawer()"></div>

<div class="confirm-drawer" id="confirmDrawer">
    <div class="p-4 border-bottom d-flex justify-content-between align-items-center bg-white">
        <h5 class="fw-bold mb-0 text-dark d-flex align-items-center gap-2">
            <button type="button" class="btn-close text-reset me-1" onclick="closeConfirmDrawer()"></button>
            <span>{{ __('labels.confirm_appointment') }}</span>
        </h5>
        <button type="button" id="submitBookAptBtn" onclick="submitBooking()" class="btn btn-primary rounded-3 px-3 py-2 fw-bold" style="background: #6366f1; border: none;">
            {{ __('labels.book_appointment') }}
        </button>
    </div>

    <div class="p-4 flex-grow-1 overflow-y-auto bg-light">
        <form id="bookingForm" onsubmit="event.preventDefault(); submitBooking();">
            @csrf
            <input type="hidden" name="doctor_id" id="formDoctorId">
            <input type="hidden" name="appointment_date" id="formAptDate">
            <input type="hidden" name="slot_time" id="formSlotTime">
            <input type="hidden" name="patient_id" id="formPatientId">

            {{-- Dynamic Alert message --}}
            <div id="drawerAlertBox" class="alert alert-dismissible fade show rounded-3 small py-2 px-3 mb-3" style="display: none;" role="alert">
                <span id="drawerAlertMessage"></span>
                <button type="button" class="btn-close py-2" onclick="hideDrawerAlert()"></button>
            </div>

            {{-- Selected Doctor Card --}}
            <div class="card border-0 shadow-sm rounded-4 mb-3">
                <div class="card-body p-3 d-flex align-items-center justify-content-between bg-white rounded-4">
                    <div class="d-flex align-items-center gap-3">
                        <div class="bg-primary bg-opacity-10 text-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 38px; height: 38px;">
                            <i class="fa-solid fa-user-doctor"></i>
                        </div>
                        <div class="fw-bold text-dark" id="displayDoctorName">Dr. Doctor</div>
                    </div>
                    <i class="fa-solid fa-pen text-primary cursor-pointer" title="Change Doctor" onclick="closeConfirmDrawer()"></i>
                </div>
            </div>

            {{-- Selected Slot Card --}}
            <div class="card border-0 shadow-sm rounded-4 mb-4">
                <div class="card-body p-3 d-flex align-items-center justify-content-between bg-white rounded-4">
                    <div class="d-flex align-items-center gap-3">
                        <div class="bg-primary bg-opacity-10 text-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 38px; height: 38px;">
                            <i class="fa-regular fa-clock"></i>
                        </div>
                        <div class="fw-bold text-dark" id="displaySlotTime">00:00 AM | YYYY-MM-DD</div>
                    </div>
                    <i class="fa-solid fa-pen text-primary cursor-pointer" title="Change Slot" onclick="closeConfirmDrawer()"></i>
                </div>
            </div>

            {{-- Patient Search Section --}}
            <div class="mb-3 position-relative" id="patientSearchWrapper">
                <label class="form-label small fw-bold text-secondary">
                    Patient Name, Mobile no & ID <span class="text-danger">*</span>
                </label>
                <div class="position-relative">
                    <i class="fa-solid fa-magnifying-glass position-absolute text-muted" style="left: 1rem; top: 50%; transform: translateY(-50%); z-index: 5;"></i>
                    <input type="text"
                           id="confirmPatientSearch"
                           class="form-control form-control-lg ps-5 pe-4 rounded-3 border-primary"
                           placeholder="Search by Patient's Name, Phone number or Id"
                           autocomplete="off"
                           style="border-radius: 12px !important; font-size: 0.9rem;">
                    <span id="clearSearchBtn" onclick="clearSearchInput()" class="position-absolute text-muted cursor-pointer" style="right: 1rem; top: 50%; transform: translateY(-50%); display: none; z-index: 5;">
                        <i class="fa-solid fa-circle-xmark"></i>
                    </span>
                </div>

                {{-- Live Search Results dropdown --}}
                <div id="confirmSearchResults" class="list-group position-absolute shadow-lg w-100 mt-1" style="z-index: 1050; display: none; max-height: 320px; overflow-y: auto; border-radius: 12px; border: 1px solid #e2e8f0; background: #ffffff;">
                    {{-- Dynamically populated with Add New Patient button at top & 5 patient results --}}
                </div>
            </div>

            {{-- Selected Patient Details Card (Shown after patient is chosen or added) --}}
            <div id="selectedPatientCard" class="card border border-success border-opacity-25 bg-success bg-opacity-10 rounded-4 mb-3 p-3" style="display: none;">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center gap-3">
                        <div class="bg-success text-white rounded-circle d-flex align-items-center justify-content-center shadow-sm" style="width: 38px; height: 38px;">
                            <i class="fa-solid fa-check"></i>
                        </div>
                        <div>
                            <div class="fw-bold text-dark" id="selPatName"></div>
                            <div class="small text-muted" id="selPatPhone"></div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-sm btn-outline-danger rounded-pill px-3 py-1 fw-bold" onclick="clearSelectedPatient()">
                        <i class="fa-solid fa-xmark me-1"></i> Change
                    </button>
                </div>
            </div>

            {{-- Quick Add Patient Card (Inline seamless patient creation) --}}
            <div id="quickAddPatientCard" class="card border-primary border-opacity-50 shadow-sm rounded-4 mb-3 p-3 bg-white" style="display: none;">
                <div class="d-flex justify-content-between align-items-center mb-2 pb-2 border-bottom">
                    <h6 class="fw-bold text-primary mb-0 d-flex align-items-center gap-2">
                        <i class="fa-solid fa-user-plus"></i> Add New Patient
                    </h6>
                    <button type="button" class="btn-close btn-sm" onclick="closeQuickAddPatient()"></button>
                </div>

                <div id="quickAddAlert" class="alert alert-danger py-1 px-2 small mb-2" style="display: none;"></div>

                <div class="row g-2 mb-2">
                    <div class="col-12">
                        <label class="form-label small fw-bold text-secondary mb-1">Full Name <span class="text-danger">*</span></label>
                        <input type="text" id="quickPatName" class="form-control rounded-3" placeholder="Enter patient full name">
                    </div>
                    <div class="col-12">
                        <label class="form-label small fw-bold text-secondary mb-1">Mobile Number <span class="text-danger">*</span></label>
                        <input type="tel" id="quickPatPhone" class="form-control rounded-3" placeholder="10-digit mobile number">
                    </div>
                    <div class="col-6">
                        <label class="form-label small fw-bold text-secondary mb-1">Gender</label>
                        <select id="quickPatGender" class="form-select rounded-3">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <div class="col-6">
                        <label class="form-label small fw-bold text-secondary mb-1">Age</label>
                        <input type="number" id="quickPatAge" class="form-control rounded-3" placeholder="e.g. 28" min="1" max="120">
                    </div>
                </div>

                <div class="d-flex justify-content-end gap-2 mt-3">
                    <button type="button" class="btn btn-sm btn-light border rounded-pill px-3" onclick="closeQuickAddPatient()">Cancel</button>
                    <button type="button" id="quickSavePatientBtn" class="btn btn-sm btn-primary rounded-pill px-3 fw-bold" onclick="saveQuickPatient()" style="background: #6366f1; border: none;">
                        <i class="fa-solid fa-check me-1"></i> Save & Select
                    </button>
                </div>
            </div>

            {{-- Manual patient inputs if not selected --}}
            <div id="manualPatientInputs" class="mb-3">
                <div class="row g-2">
                    <div class="col-6">
                        <input type="text" name="patient_name" id="formPatientName" class="form-control rounded-3" placeholder="Full Name *" required>
                    </div>
                    <div class="col-6">
                        <input type="text" name="patient_phone" id="formPatientPhone" class="form-control rounded-3" placeholder="Mobile No *" required>
                    </div>
                </div>
            </div>

            {{-- Add New Patient Pill Button --}}
            <div class="mb-4" id="addNewPatientPillWrapper">
                <button type="button" onclick="openQuickAddPatient()" class="btn btn-outline-primary rounded-pill px-3 py-1.5 fw-bold text-decoration-none small shadow-sm">
                    <i class="fa-solid fa-plus me-1"></i> {{ __('labels.add_new_patient') }}
                </button>
            </div>

            {{-- Remarks Textarea --}}
            <div class="mb-3">
                <label class="form-label small fw-bold text-secondary">{{ __('labels.remarks') }}</label>
                <textarea name="remarks" id="formRemarks" class="form-control rounded-3" rows="3" placeholder="{{ __('labels.write_remarks_placeholder') }}" style="border-radius: 12px;"></textarea>
            </div>
        </form>
    </div>
</div>

<style>
/* Smooth custom styles for Confirm Appointment Drawer */
.confirm-drawer {
    box-shadow: -12px 0 35px rgba(15, 23, 42, 0.2);
    transition: right 0.35s cubic-bezier(0.16, 1, 0.3, 1);
}
.confirm-drawer-backdrop {
    transition: opacity 0.3s ease;
}
.confirm-dropdown-add-header:hover {
    background-color: #e0e7ff !important;
}
.confirm-pat-item:hover {
    background-color: #f8fafc;
}
.cursor-pointer {
    cursor: pointer;
}
#confirmSearchResults::-webkit-scrollbar {
    width: 6px;
}
#confirmSearchResults::-webkit-scrollbar-thumb {
    background-color: #cbd5e1;
    border-radius: 4px;
}
</style>

<script>
let searchDebounceTimeout = null;

function openConfirmDrawer() {
    document.getElementById('formDoctorId').value = selectedDoctorId;
    document.getElementById('formAptDate').value = selectedDateStr;
    document.getElementById('formSlotTime').value = selectedSlotTime;

    document.getElementById('displayDoctorName').textContent = selectedDoctorName;
    document.getElementById('displaySlotTime').textContent = `${selectedSlotTime} | ${selectedDateStr}`;

    document.getElementById('confirmBackdrop').classList.add('show');
    document.getElementById('confirmDrawer').classList.add('open');

    // Auto load initial 5 patients for instant seamless selection
    fetchAndDisplayPatients('');
}

function closeConfirmDrawer() {
    document.getElementById('confirmBackdrop').classList.remove('show');
    document.getElementById('confirmDrawer').classList.remove('open');
    closeQuickAddPatient();
    hideSearchResults();
}

function showDrawerAlert(message, type = 'danger') {
    const alertBox = document.getElementById('drawerAlertBox');
    const alertMsg = document.getElementById('drawerAlertMessage');
    alertBox.className = `alert alert-${type} alert-dismissible fade show rounded-3 small py-2 px-3 mb-3`;
    alertMsg.textContent = message;
    alertBox.style.display = 'block';
}

function hideDrawerAlert() {
    const alertBox = document.getElementById('drawerAlertBox');
    if (alertBox) alertBox.style.display = 'none';
}

function clearSearchInput() {
    const pInput = document.getElementById('confirmPatientSearch');
    pInput.value = '';
    document.getElementById('clearSearchBtn').style.display = 'none';
    fetchAndDisplayPatients('');
    pInput.focus();
}

function hideSearchResults() {
    const results = document.getElementById('confirmSearchResults');
    if (results) results.style.display = 'none';
}

// Fetch patients from backend (Limit 5)
function fetchAndDisplayPatients(query) {
    const results = document.getElementById('confirmSearchResults');
    const clearBtn = document.getElementById('clearSearchBtn');

    if (query && query.trim().length > 0) {
        clearBtn.style.display = 'block';
    } else {
        clearBtn.style.display = 'none';
    }

    fetch("{{ route('admin.appointments.search-patients') }}?q=" + encodeURIComponent(query || ''))
        .then(res => res.json())
        .then(data => {
            renderPatientDropdown(data || [], query || '');
        })
        .catch(err => {
            console.error('Error fetching patients:', err);
        });
}

// Render dropdown with "+ Add New Patient" ALWAYS at the top, followed by 5 patients
function renderPatientDropdown(patients, query) {
    const results = document.getElementById('confirmSearchResults');
    results.innerHTML = '';

    // 1. FIRST ITEM: Add New Patient Action
    const addHeader = document.createElement('div');
    addHeader.className = 'confirm-dropdown-add-header p-2.5 px-3 border-bottom d-flex align-items-center justify-content-between cursor-pointer';
    addHeader.style.background = '#eef2ff';
    addHeader.innerHTML = `
        <div class="d-flex align-items-center gap-2 text-primary fw-bold small">
            <span class="rounded-circle d-flex align-items-center justify-content-center text-white" style="width: 24px; height: 24px; background: #6366f1;">
                <i class="fa-solid fa-plus" style="font-size: 0.72rem;"></i>
            </span>
            <span>+ Add New Patient</span>
        </div>
        <span class="badge rounded-pill fw-semibold" style="background: rgba(99, 102, 241, 0.15); color: #6366f1; font-size: 0.7rem;">Quick Add</span>
    `;
    addHeader.onclick = function() {
        openQuickAddPatient(query);
    };
    results.appendChild(addHeader);

    // 2. Patient List (Max 5 data)
    if (patients && patients.length > 0) {
        const titleDivider = document.createElement('div');
        titleDivider.className = 'px-3 py-1.5 bg-light text-muted small fw-semibold border-bottom';
        titleDivider.style.fontSize = '0.72rem';
        titleDivider.style.letterSpacing = '0.5px';
        titleDivider.textContent = query.trim() ? 'MATCHING PATIENTS (MAX 5)' : 'RECENT PATIENTS (MAX 5)';
        results.appendChild(titleDivider);

        // Limit to 5 strictly
        const sliceData = patients.slice(0, 5);
        sliceData.forEach(p => {
            const item = document.createElement('a');
            item.href = 'javascript:void(0)';
            item.className = 'list-group-item list-group-item-action py-2 px-3 border-0 border-bottom d-flex align-items-center justify-content-between confirm-pat-item';
            
            const firstLetter = (p.name || 'P').charAt(0).toUpperCase();

            item.innerHTML = `
                <div class="d-flex align-items-center gap-2">
                    <div class="rounded-circle bg-light border text-secondary d-flex align-items-center justify-content-center fw-bold" style="width: 32px; height: 32px; font-size: 0.8rem;">
                        ${firstLetter}
                    </div>
                    <div>
                        <div class="fw-bold text-dark mb-0" style="font-size: 0.88rem;">${escapeHtml(p.name)}</div>
                        <div class="text-muted" style="font-size: 0.76rem;">
                            ${p.phone ? '<i class="fa-solid fa-phone me-1 text-secondary" style="font-size:0.68rem;"></i>' + escapeHtml(p.phone) : 'No phone'}
                        </div>
                    </div>
                </div>
                <span class="badge bg-light text-primary border rounded-pill px-2 py-1" style="font-size: 0.72rem; font-weight: 600;">
                    ${escapeHtml(p.patient_id_formatted)}
                </span>
            `;

            item.onclick = function(e) {
                e.preventDefault();
                selectPatientForConfirm(p);
            };

            results.appendChild(item);
        });
    } else {
        const noResult = document.createElement('div');
        noResult.className = 'p-3 text-center text-muted small';
        noResult.innerHTML = `
            <div class="mb-1"><i class="fa-regular fa-folder-open text-secondary"></i></div>
            <div>No patient found ${query.trim() ? 'matching "<strong>' + escapeHtml(query) + '</strong>"' : ''}</div>
            <button type="button" class="btn btn-sm btn-outline-primary rounded-pill mt-2 px-3 fw-bold" onclick="openQuickAddPatient('${escapeHtml(query)}')">
                <i class="fa-solid fa-plus me-1"></i> Add as New Patient
            </button>
        `;
        results.appendChild(noResult);
    }

    results.style.display = 'block';
}

function escapeHtml(text) {
    if (!text) return '';
    return String(text)
        .replace(/&/g, '&amp;')
        .replace(/</g, '&lt;')
        .replace(/>/g, '&gt;')
        .replace(/"/g, '&quot;')
        .replace(/'/g, '&#039;');
}

document.addEventListener('DOMContentLoaded', function() {
    const pInput = document.getElementById('confirmPatientSearch');
    const results = document.getElementById('confirmSearchResults');
    const wrapper = document.getElementById('patientSearchWrapper');

    if (!pInput) return;

    // Show initial 5 patients on click/focus
    pInput.addEventListener('focus', function() {
        fetchAndDisplayPatients(this.value.trim());
    });

    // Debounced search on input
    pInput.addEventListener('input', function() {
        clearTimeout(searchDebounceTimeout);
        const val = this.value;
        searchDebounceTimeout = setTimeout(() => {
            fetchAndDisplayPatients(val.trim());
        }, 200);
    });

    // Close dropdown on outside click
    document.addEventListener('click', function(e) {
        if (wrapper && !wrapper.contains(e.target)) {
            hideSearchResults();
        }
    });

    // Close on Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            if (results && results.style.display === 'block') {
                hideSearchResults();
            } else {
                closeConfirmDrawer();
            }
        }
    });
});

function selectPatientForConfirm(p) {
    document.getElementById('formPatientId').value = p.id;
    document.getElementById('formPatientName').value = p.name;
    document.getElementById('formPatientPhone').value = p.phone || '';

    document.getElementById('selPatName').textContent = p.name;
    document.getElementById('selPatPhone').textContent = `${p.phone || 'No phone'} • ${p.patient_id_formatted}`;

    document.getElementById('selectedPatientCard').style.display = 'block';
    document.getElementById('manualPatientInputs').style.display = 'none';
    document.getElementById('addNewPatientPillWrapper').style.display = 'none';
    closeQuickAddPatient();
    hideSearchResults();
    hideDrawerAlert();
}

function clearSelectedPatient() {
    document.getElementById('formPatientId').value = '';
    document.getElementById('formPatientName').value = '';
    document.getElementById('formPatientPhone').value = '';
    document.getElementById('confirmPatientSearch').value = '';

    document.getElementById('selectedPatientCard').style.display = 'none';
    document.getElementById('manualPatientInputs').style.display = 'block';
    document.getElementById('addNewPatientPillWrapper').style.display = 'block';

    const pInput = document.getElementById('confirmPatientSearch');
    pInput.focus();
    fetchAndDisplayPatients('');
}

// Open Quick Add Patient Form
function openQuickAddPatient(prefillVal = '') {
    hideSearchResults();
    const card = document.getElementById('quickAddPatientCard');
    const nameInput = document.getElementById('quickPatName');
    const phoneInput = document.getElementById('quickPatPhone');
    const alertBox = document.getElementById('quickAddAlert');

    alertBox.style.display = 'none';
    card.style.display = 'block';

    // If prefill value is numeric, prefill phone; otherwise prefill name
    if (prefillVal && prefillVal.trim()) {
        const clean = prefillVal.trim();
        if (/^\d+$/.test(clean)) {
            phoneInput.value = clean;
            nameInput.value = '';
            nameInput.focus();
        } else {
            nameInput.value = clean;
            phoneInput.value = '';
            phoneInput.focus();
        }
    } else {
        nameInput.value = '';
        phoneInput.value = '';
        nameInput.focus();
    }
}

function closeQuickAddPatient() {
    const card = document.getElementById('quickAddPatientCard');
    if (card) card.style.display = 'none';
}

// Save New Patient via AJAX
function saveQuickPatient() {
    const name = document.getElementById('quickPatName').value.trim();
    const phone = document.getElementById('quickPatPhone').value.trim();
    const gender = document.getElementById('quickPatGender').value;
    const age = document.getElementById('quickPatAge').value.trim();
    const alertBox = document.getElementById('quickAddAlert');
    const btn = document.getElementById('quickSavePatientBtn');

    if (!name) {
        alertBox.textContent = 'Please enter patient full name.';
        alertBox.style.display = 'block';
        return;
    }
    if (!phone) {
        alertBox.textContent = 'Please enter mobile number.';
        alertBox.style.display = 'block';
        return;
    }

    alertBox.style.display = 'none';
    btn.disabled = true;
    btn.innerHTML = '<i class="fa-solid fa-spinner fa-spin me-1"></i> Saving...';

    fetch("{{ route('admin.appointments.quick-create-patient') }}", {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Accept': 'application/json'
        },
        body: JSON.stringify({
            patient_name: name,
            patient_phone: phone,
            gender: gender,
            age: age
        })
    })
    .then(res => res.json())
    .then(data => {
        btn.disabled = false;
        btn.innerHTML = '<i class="fa-solid fa-check me-1"></i> Save & Select';

        if (data.success && data.patient) {
            selectPatientForConfirm(data.patient);
            showDrawerAlert(data.message || 'Patient added and selected successfully!', 'success');
        } else {
            alertBox.textContent = data.message || 'Failed to add patient.';
            alertBox.style.display = 'block';
        }
    })
    .catch(err => {
        btn.disabled = false;
        btn.innerHTML = '<i class="fa-solid fa-check me-1"></i> Save & Select';
        alertBox.textContent = 'Error connecting to server. Please try again.';
        alertBox.style.display = 'block';
        console.error(err);
    });
}

// Submit Appointment Booking
function submitBooking() {
    const doctor_id = document.getElementById('formDoctorId').value;
    const appointment_date = document.getElementById('formAptDate').value;
    const slot_time = document.getElementById('formSlotTime').value;
    const patient_id = document.getElementById('formPatientId').value;
    const patient_name = document.getElementById('formPatientName').value.trim();
    const patient_phone = document.getElementById('formPatientPhone').value.trim();
    const remarks = document.getElementById('formRemarks').value.trim();

    if (!doctor_id || !appointment_date || !slot_time) {
        showDrawerAlert('Appointment slot or doctor information is missing.', 'danger');
        return;
    }

    if (!patient_name || !patient_phone) {
        showDrawerAlert('Please select a patient from search or enter Full Name and Mobile Number.', 'danger');
        return;
    }

    const btn = document.getElementById('submitBookAptBtn');
    btn.disabled = true;
    btn.innerHTML = '<i class="fa-solid fa-spinner fa-spin me-1"></i> Booking...';

    fetch("{{ route('admin.appointments.store') }}", {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Accept': 'application/json'
        },
        body: JSON.stringify({
            doctor_id,
            appointment_date,
            slot_time,
            patient_id,
            patient_name,
            patient_phone,
            remarks,
            visit_type: 'Walk-In'
        })
    })
    .then(res => res.json())
    .then(data => {
        btn.disabled = false;
        btn.innerHTML = '{{ __("labels.book_appointment") }}';

        if (data.success) {
            window.location.href = "{{ route('admin.appointments.index') }}";
        } else {
            showDrawerAlert(data.message || 'Booking failed.', 'danger');
        }
    })
    .catch(err => {
        btn.disabled = false;
        btn.innerHTML = '{{ __("labels.book_appointment") }}';
        console.error(err);
        showDrawerAlert('Server error booking appointment. Please try again.', 'danger');
    });
}
</script>
