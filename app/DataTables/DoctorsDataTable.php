<?php

namespace App\DataTables;

use App\Helpers\UserHelper;
use App\Models\User;
use App\Support\SecureRouteParameter;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class DoctorsDataTable extends DataTable
{
    private $user;

    public function __construct()
    {
        $this->user = UserHelper::getLoggedInUser();
    }

    /**
     * Build DataTable class.
     *
     * @param  QueryBuilder  $query  Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        $user = $this->user;

        return (new EloquentDataTable($query))
            ->addIndexColumn()
            ->addColumn('action', function ($row) use ($user) {
                $routeId = SecureRouteParameter::encode($row->id);
                $routeParameters = ['doctor' => $routeId];
                $editRoute = $user->can('doctor-edit') ? route('admin.doctors.edit', $routeParameters) : '';
                $deleteRoute = $user->can('doctor-delete') ? route('admin.doctors.destroy', $routeParameters) : '';
                $viewRoute = $user->can('doctor-show') ? route('admin.doctors.show', $routeParameters) : '';

                return view('layouts.partials.dataTable-action-button', compact('editRoute', 'deleteRoute', 'viewRoute'));
            })
            ->addColumn('profile_pic', function ($row) {
                if (!empty($row->profile_pic)) {
                    $src = asset('storage/profile_images/' . $row->profile_pic);
                    return '<img src="' . e($src) . '" class="rounded-circle object-fit-cover shadow-sm border" width="36" height="36" alt="' . e($row->name) . '" onerror="this.style.display=\'none\';">';
                }
                $initials = strtoupper(substr($row->first_name ?? 'D', 0, 1) . substr($row->last_name ?? '', 0, 1));
                return '<div class="rounded-circle bg-primary-subtle text-primary fw-bold d-inline-flex align-items-center justify-content-center border" style="width:36px;height:36px;font-size:12px;">' . e($initials) . '</div>';
            })
            ->editColumn('specialization', function ($row) {
                return $row->specialization ? '<span class="badge bg-primary-subtle text-primary border border-primary-subtle">' . e($row->specialization_label) . '</span>' : '<span class="text-muted">N/A</span>';
            })
            ->editColumn('experience', function ($row) {
                return ($row->experience !== null && $row->experience !== '') ? '<span class="badge bg-secondary-subtle text-dark border">' . e($row->experience_text) . '</span>' : '<span class="text-muted">N/A</span>';
            })
            ->editColumn('status', function ($row) {
                return $row->status ? __('labels.'.$row->status) : 'N/A';
            })
            ->editColumn('phone_no', function ($row) {
                return $row->phone_no ? $row->phone_no : 'N/A';
            })
            ->editColumn('qualification', function ($row) {
                return $row->qualification ? $row->qualification : 'N/A';
            })
            ->editColumn('registration_number', function ($row) {
                return $row->registration_number ? $row->registration_number : 'N/A';
            })
            ->rawColumns(['action', 'profile_pic', 'specialization', 'experience'])
            ->setRowId('id');
    }

    /**
     * Get query source of dataTable.
     */
    public function query(User $model): QueryBuilder
    {
        return $model->newQuery()->role(config('constants.doctor_role_name'));
    }

    public function html(): HtmlBuilder
    {
        $createDoctor = $this->user->can('doctor-create');

        $dataTable = $this->builder()
            ->setTableId('doctors-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom("<'d-flex justify-content-start mb-2'B><'search-bar-wrapper'lf>r<'table-wrapper yajra-table-custom-class table-responsive'tr><'pagination-wrapper'ip>")
            ->orderBy(2);

        $buttons = [];
        if ($createDoctor) {
            $buttons[] = Button::make('add')
                ->attr(['class' => 'btn text-center btn-primary my-custom-btn'])
                ->text(__('buttons.create'));
        }
        $dataTable->buttons($buttons);

        return $dataTable
            ->parameters([
                'processing' => false,
                'language' => [
                    'searchPlaceholder' => __('labels.search'),
                ],
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::computed('DT_RowIndex')
                ->title(__('labels.id'))
                ->width(40)
                ->addClass('text-center'),
            Column::computed('profile_pic')
                ->title('Photo')
                ->exportable(false)
                ->printable(false)
                ->width(50)
                ->addClass('text-center'),
            Column::make('first_name')->title(__('labels.first_name')),
            Column::make('last_name')->title(__('labels.last_name')),
            Column::make('specialization')->title('Specialization'),
            Column::make('experience')->title('Experience'),
            Column::make('email')->title(__('labels.email')),
            Column::make('phone_no')->title(__('labels.mobile_number')),
            Column::make('qualification')->title('Qualification'),
            Column::make('registration_number')->title('Registration Number'),
            Column::make('status')->title(__('labels.status')),
            Column::computed('action')->title(__('labels.action'))
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     */
    protected function filename(): string
    {
        return 'Doctors_'.date('YmdHis');
    }
}
