<?= $this->extend('layouts/layout') ?>
<?= $this->section('content') ?>
<?php if (session('message')) : ?>
    <!--begin::Notice-->
    <div class="notice d-flex bg-light-success rounded border-success border border-dashed mb-9 p-6">
        <!--begin::Icon-->
        <i class="ki-duotone ki-check-square fs-2tx text-success me-4">
            <span class="path1"></span>
            <span class="path2"></span>
            <span class="path3"></span>
        </i>
        <!--end::Icon-->
        <!--begin::Wrapper-->
        <div class="d-flex flex-stack flex-grow-1">
            <!--begin::Content-->
            <div class="fw-semibold">
                <h4 class="text-gray-900 fw-bold">Berhasil</h4>
                <div class="fs-6 text-gray-700"><?= session('message'); ?></div>
            </div>
            <!--end::Content-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Notice-->
<?php endif; ?>

<?php if (session('error')) : ?>
    <!--begin::Notice-->
    <div class="notice d-flex bg-light-warning rounded border-warning border border-dashed mb-9 p-6">
        <!--begin::Icon-->
        <i class="ki-duotone ki-information fs-2tx text-warning me-4">
            <span class="path1"></span>
            <span class="path2"></span>
            <span class="path3"></span>
        </i>
        <!--end::Icon-->
        <!--begin::Wrapper-->
        <div class="d-flex flex-stack flex-grow-1">
            <!--begin::Content-->
            <div class="fw-semibold">
                <h4 class="text-gray-900 fw-bold">Gagal</h4>
                <div class="fs-6 text-gray-700">
                    <?= session('error'); ?>
                </div>
            </div>
            <!--end::Content-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Notice-->
<?php endif; ?>

    <!--begin::Card-->
    <div class="card">
        <!--begin::Card header-->
        <div class="card-header border-0 pt-6">
            <!--begin::Card title-->
            <div class="card-title">
                <!--begin::Search-->
                <div class="d-flex align-items-center position-relative my-1">
                    <i class="ki-outline ki-magnifier fs-3 position-absolute ms-5"></i>
                    <input type="text" data-kt-user-table-filter="search"
                           class="form-control form-control-solid w-250px ps-13" placeholder="Cari .."/>
                </div>
                <!--end::Search-->
            </div>
            <!--begin::Card title-->
            <!--begin::Card toolbar-->
            <div class="card-toolbar">
                <!--begin::Toolbar-->
                <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                    <!--end::Filter-->
                    <?php if (hasActionAccess('create', user_id())) : ?>
                        <!--begin::Add user-->
                        <button type="button" class="btn btn-light-success" data-bs-toggle="modal" data-bs-target="#kt_modal_add_user">
                            <i class="ki-outline ki-plus-square fs-3"></i>Tambah Data Ekstrakurikuler
                        </button>
                        <!--end::Add user-->
                    <?php endif ?>
                </div>
                <!--end::Toolbar-->
                <!--begin::Modal - Add task-->
                <div class="modal fade" id="kt_modal_add_user" tabindex="-1" aria-hidden="true">
                    <!--begin::Modal dialog-->
                    <div class="modal-dialog modal-dialog-centered mw-650px">
                        <!--begin::Modal content-->
                        <div class="modal-content">
                            <!--begin::Modal header-->
                            <div class="modal-header" id="kt_modal_add_user_header">
                                <!--begin::Modal title-->
                                <h2 class="fw-bold">Tambah Ekstrakurikuler</h2>
                                <!--end::Modal title-->
                                <!--begin::Close-->
                                <div class="btn btn-icon btn-sm btn-active-icon-success"
                                     data-bs-dismiss="modal">
                                    <i class="ki-outline ki-cross fs-1"></i>
                                </div>
                                <!--end::Close-->
                            </div>
                            <!--end::Modal header-->
                            <!--begin::Modal body-->
                            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                                <!--begin::Form-->
                                <form action="<?= base_url('data-ekskul/store') ?>" method="post">
                                    <!--begin::Scroll-->
                                    <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_user_scroll"
                                         data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}"
                                         data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header" data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">
                                        <!--begin::Input group-->
                                        <div class="fv-row mb-7">
                                            <!--begin::Label-->
                                            <label class="required fw-semibold fs-6 mb-2">Nama Ekskul</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text" name="ekskul" id="ekskul"
                                                   class="form-control form-control-solid mb-3 mb-lg-0"
                                                   placeholder="Masukkan Nama Ekstrakurikuler" required/>
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="fv-row mb-7">
                                            <!--begin::Label-->
                                            <label class="fw-semibold fs-6 mb-2 required">Koordinator</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <select class="form-select form-select-solid" data-control="select2"
                                                    data-placeholder="Pilih Koordinator"
                                                    name="koordinator_nip" id="koordinator_nip"
                                                    data-dropdown-parent="#kt_modal_add_user"
                                                    data-allow-clear="true" required>
                                                <option></option>
                                                <?php foreach ($koordinator as $item) : ?>
                                                    <option value="<?= $item['nip_koordinator'] ?>"><?= $item['nama_lengkap'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Input group-->
                                    </div>
                                    <!--end::Scroll-->
                                    <!--begin::Actions-->
                                    <div class="text-center pt-15">
                                        <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal">
                                            Batal
                                        </button>
                                        <button type="submit" class="btn btn-success" data-kt-users-modal-action="submit">
                                            <span class="indicator-label">Kirim</span>
                                            <span class="indicator-progress">Harap tunggu...
                                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                            </span>
                                        </button>
                                    </div>
                                    <!--end::Actions-->
                                </form>
                                <!--end::Form-->
                            </div>
                            <!--end::Modal body-->
                        </div>
                        <!--end::Modal content-->
                    </div>
                    <!--end::Modal dialog-->
                </div>
                <!--end::Modal - Add task-->
            </div>
            <!--end::Card toolbar-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body py-4">
            <!--begin::Table-->
            <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">
                <thead>
                <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                    <th class="min-w-125px">Ekstrakurikuler</th>
                    <th class="min-w-125px">NIP Koordinator</th>
                    <th class="min-w-125px">Nama Koordinator</th>
                    <th class="text-end min-w-100px">Actions</th>
                </tr>
                </thead>
                <tbody class="text-gray-600 fw-semibold">
                <?php foreach ($ekskul as $item) : ?>
                    <tr>
                        <td><?= $item['ekskul'] ?> </td>
                        <td><?= $item['nip_koordinator'] ?> </td>
                        <td><?= $item['nama_lengkap'] ?> </td>
                        <td class="text-end">
                            <a class="btn btn-light btn-active-light-success btn-flex btn-center btn-sm"
                               data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                <i class="ki-outline ki-down fs-5 ms-1"></i></a>
                            <!--begin::Menu-->
                            <div
                                class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-success fw-semibold fs-7 w-125px py-4"
                                data-kt-menu="true">
                                <!--end::Menu item-->
                                <?php if (hasActionAccess('write', user_id())): ?>
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a class="menu-link px-3" data-bs-toggle="modal" data-bs-target="#kt_modal_update_user_<?= $item['id_ekskul'] ?>">Update</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="<?= base_url('data-ekskul/delete/'.$item['id_ekskul']) ?>" class="menu-link px-3" onclick="return confirm('Data akan dihapus, yakin?')">Delete</a>
                                    </div>
                                    <!--end::Menu item-->
                                <?php endif; ?>
                            </div>
                            <!--end::Menu-->
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            <!--end::Table-->
        </div>
        <!--end::Card body-->
    </div>
    <!--end::Card-->


<?php foreach($ekskul as $item) : ?>
    <!--begin::Modal - Add task-->
    <div class="modal fade" id="kt_modal_update_user_<?= $item['id_ekskul'] ?>" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header" id="kt_modal_update_user_header">
                    <!--begin::Modal title-->
                    <h2 class="fw-bold">Ubah Data Ekskul</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-icon-success"
                         data-bs-dismiss="modal">
                        <i class="ki-outline ki-cross fs-1"></i>
                    </div>
                    <!--end::Close-->
                </div>
                <!--end::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                    <!--begin::Form-->
                    <form action="<?= base_url('data-ekskul/store')?>" method="post">
                        <?= csrf_field() ?>
                        <?= form_hidden('id_ekskul', $item['id_ekskul']) ?>
                        <!--begin::Scroll-->
                        <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_update_user_scroll"
                             data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}"
                             data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_update_user_header" data-kt-scroll-wrappers="#kt_modal_update_user_scroll" data-kt-scroll-offset="300px">
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-semibold fs-6 mb-2">Ekstrakurikuler</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="ekskul" id="ekskul"
                                       class="form-control form-control-solid mb-3 mb-lg-0"
                                       placeholder="Masukkan Nama Ekstrakurikuler" value="<?= $item['ekskul'] ?>"/>
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="fw-semibold fs-6 mb-2 required">Koordinator</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <select class="form-select form-select-solid" data-control="select2"
                                        data-placeholder="Pilih Wali Santri"
                                        name="koordinator_nip" id="koordinator_nip"
                                        data-dropdown-parent="#kt_modal_update_user_<?= $item['id_ekskul'] ?>"
                                        data-allow-clear="true">
                                    <option></option>
                                    <?php foreach ($koordinator as $w) : ?>
                                        <option value="<?= $w['nip_koordinator'] ?>" <?= $item['koordinator_nip'] == $w['nip_koordinator'] ? 'selected' : '' ?>><?= $w['nip_koordinator'] ?> - <?= $w['nama_lengkap'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                        </div>
                        <!--end::Scroll-->
                        <!--begin::Actions-->
                        <div class="text-center pt-15">
                            <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal">
                                Batal
                            </button>
                            <button type="submit" class="btn btn-success" data-kt-users-modal-action="submit">
                                <span class="indicator-label">Kirim</span>
                                <span class="indicator-progress">Harap tunggu...
                                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                            </span>
                            </button>
                        </div>
                        <!--end::Actions-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Modal body-->
            </div>
            <!--end::Modal content-->
        </div>
        <!--end::Modal dialog-->
    </div>
    <!--end::Modal - Add task-->
<?php endforeach ?>

<?= $this->endSection(); ?>