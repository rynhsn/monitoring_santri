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
                                <h2 class="fw-bold">Buat Ekstrakurikuler</h2>
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
                                <form action="<?= base_url('ekstrakurikuler/store') ?>" method="post">
                                    <!--begin::Scroll-->
                                    <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_user_scroll"
                                         data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}"
                                         data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header" data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">
                                        <!--begin::Input group-->
                                        <div class="fv-row mb-7">
                                            <!--begin::Label-->
                                            <label class="required fw-semibold fs-6 mb-2">NIK</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="number" name="nik_santri" id="nik_santri"
                                                   class="form-control form-control-solid mb-3 mb-lg-0"
                                                   placeholder="Masukkan NIK Santri" required/>
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="fv-row mb-7">
                                            <!--begin::Label-->
                                            <label class="required fw-semibold fs-6 mb-2">Nama Lengkap</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text" name="nama_lengkap" id="nama_lengkap"
                                                   class="form-control form-control-solid mb-3 mb-lg-0"
                                                   placeholder="Masukkan Nama Lengkap Santri" required/>
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="fv-row mb-7">
                                            <!--begin::Label-->
                                            <label class="required fw-semibold fs-6 mb-2">Jenis Kelamin</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <!--begin::Col-->
                                            <div class="col-lg mb-2">
                                                <label class="form-check form-check-custom form-check-solid">
                                                    <input class="form-check-input" name="jk" type="radio"
                                                           value="L" <?= old('jk') != "P" ? 'checked' : '' ?>/>
                                                    <span class="form-check-label">Laki-laki</span>
                                                </label>
                                            </div>
                                            <div class="invalid-feedback">
                                                <?= validation_show_error('jk'); ?>
                                            </div>
                                            <div class="col-lg">
                                                <label class="form-check form-check-custom form-check-solid">
                                                    <input class="form-check-input" name="jk" type="radio"
                                                           value="P" <?= old('jk') == "P" ? 'checked' : '' ?>/>
                                                    <span class="form-check-label">Perempuan</span>
                                                </label>
                                            </div>
                                            <!--end::Col-->
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="fv-row mb-7">
                                            <!--begin::Label-->
                                            <label class="fw-semibold fs-6 mb-2 required">Email</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="email" name="email" id="email"
                                                   placeholder="Masukkan email santri"
                                                   class="form-control form-control-solid mb-3 mb-lg-0" required/>
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="fv-row mb-7">
                                            <!--begin::Label-->
                                            <label class="fw-semibold fs-6 mb-2 required">Kelas</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <select class="form-select form-select-solid" data-control="select2"
                                                    data-placeholder="Pilih Kelas"
                                                    name="kelas_id" id="kelas_id"
                                                    data-dropdown-parent="#kt_modal_add_user"
                                                    data-allow-clear="true" required>
                                                <option></option>
                                                <?php foreach ($kelas as $item) : ?>
                                                    <option value="<?= $item['id_kelas'] ?>"><?= $item['kelas'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="fv-row mb-7">
                                            <!--begin::Label-->
                                            <label class="fw-semibold fs-6 mb-2 required">Wali Santri</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <select class="form-select form-select-solid" data-control="select2"
                                                    data-placeholder="Pilih Wali Santri"
                                                    name="wali_nik" id="wali_nik"
                                                    data-dropdown-parent="#kt_modal_add_user"
                                                    data-allow-clear="true" required>
                                                <option></option>
                                                <?php foreach ($wali as $item) : ?>
                                                    <option value="<?= $item['nik_wali'] ?>"><?= $item['nik_wali'] ?> - <?= $item['nama_lengkap'] ?></option>
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
                    <th class="min-w-125px">NIK</th>
                    <th class="min-w-125px">Nama Santri</th>
                    <th class="min-w-125px">Nama Wali</th>
                    <th class="min-w-50px">Kelas</th>
                    <th class="min-w-50px">Jenis Kelamin</th>
                    <th class="min-w-50px">Dibuat</th>
                    <th class="text-end min-w-100px">Actions</th>
                </tr>
                </thead>
                <tbody class="text-gray-600 fw-semibold">
                <?php foreach ($santri as $item) : ?>
                    <tr>
                        <td><?= $item['nik_santri'] ?> </td>
                        <td><?= $item['nama_lengkap'] ?> </td>
                        <td><?= $item['nama_wali'] ?> </td>
                        <td>
                            <span class="badge badge-light-<?= COLOR[$item['kelas_id'] % count(COLOR)] ?> fw-bolder"><?= $item['kelas'] ?></span>
                        </td>
                        <td><?= JENIS_KELAMIN[$item['jk']] ?> </td>
                        <td><?= date('d M Y', strtotime($item['created_at'])) ?></td>

                        <td class="text-end">
                            <a class="btn btn-light btn-active-light-success btn-flex btn-center btn-sm"
                               data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                <i class="ki-outline ki-down fs-5 ms-1"></i></a>
                            <!--begin::Menu-->
                            <div
                                class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-success fw-semibold fs-7 w-125px py-4"
                                data-kt-menu="true">
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="<?= base_url('santri/detail/' . $item['nik_santri']) ?>"
                                       class="menu-link px-3">View</a>
                                </div>
                                <!--end::Menu item-->
                                <?php if (hasActionAccess('write', user_id())): ?>
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a class="menu-link px-3" data-bs-toggle="modal" data-bs-target="#kt_modal_update_user_<?= $item['nik_santri'] ?>">Update</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="<?= base_url('santri/delete/'.$item['nik_santri']) ?>" class="menu-link px-3" onclick="return confirm('Data akan dihapus, yakin?')">Delete</a>
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

<?php foreach($santri as $item) : ?>
    <!--begin::Modal - Add task-->
    <div class="modal fade" id="kt_modal_update_user_<?= $item['nik_santri'] ?>" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header" id="kt_modal_update_user_header">
                    <!--begin::Modal title-->
                    <h2 class="fw-bold">Ubah Data Santri</h2>
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
                    <form action="<?= base_url('santri/store')?>" method="post">
                        <!--begin::Scroll-->
                        <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_update_user_scroll"
                             data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}"
                             data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_update_user_header" data-kt-scroll-wrappers="#kt_modal_update_user_scroll" data-kt-scroll-offset="300px">
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-semibold fs-6 mb-2">NIK</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="number" name="nik_santri" id="nik_santri"
                                       class="form-control form-control-solid mb-3 mb-lg-0"
                                       placeholder="Masukkan NIK Santri" value="<?= $item['nik_santri'] ?>" disabled/>
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-semibold fs-6 mb-2">Nama Lengkap</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="nama_lengkap" id="nama_lengkap"
                                       class="form-control form-control-solid mb-3 mb-lg-0"
                                       placeholder="Masukkan Nama Lengkap Santri" value="<?= $item['nama_lengkap'] ?>" required/>
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-semibold fs-6 mb-2">Jenis Kelamin</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <!--begin::Col-->
                                <div class="col-lg mb-2">
                                    <label class="form-check form-check-custom form-check-solid">
                                        <input class="form-check-input" name="jk" type="radio"
                                               value="L" <?= old('jk') != "P" || $item['jk'] != 'P' ? 'checked' : '' ?>/>
                                        <span class="form-check-label">Laki-laki</span>
                                    </label>
                                </div>
                                <div class="invalid-feedback">
                                    <?= validation_show_error('jk'); ?>
                                </div>
                                <div class="col-lg">
                                    <label class="form-check form-check-custom form-check-solid">
                                        <input class="form-check-input" name="jk" type="radio"
                                               value="P" <?= old('jk') == "P" || $item['jk'] == 'P' ? 'checked' : '' ?>/>
                                        <span class="form-check-label">Perempuan</span>
                                    </label>
                                </div>
                                <!--end::Col-->
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="fw-semibold fs-6 mb-2 required">Email</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="email" name="email" id="email"
                                       placeholder="Masukkan email santri"
                                       class="form-control form-control-solid mb-3 mb-lg-0" value="<?= $item['email'] ?>" required/>
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="fw-semibold fs-6 mb-2 required">Kelas</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <select class="form-select form-select-solid" data-control="select2"
                                        data-placeholder="Pilih Kelas"
                                        name="kelas_id" id="kelas_id"
                                        data-dropdown-parent="#kt_modal_update_user"
                                        data-allow-clear="true">
                                    <option></option>
                                    <?php foreach ($kelas as $k) : ?>
                                        <option value="<?= $k['id_kelas'] ?>" <?= $item['kelas_id'] == $k['id_kelas'] ? 'selected' : '' ?>><?= $k['kelas'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="fw-semibold fs-6 mb-2 required">Wali Santri</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <select class="form-select form-select-solid" data-control="select2"
                                        data-placeholder="Pilih Wali Santri"
                                        name="wali_nik" id="wali_nik"
                                        data-dropdown-parent="#kt_modal_update_user"
                                        data-allow-clear="true">
                                    <option></option>
                                    <?php foreach ($wali as $w) : ?>
                                        <option value="<?= $w['nik_wali'] ?>" <?= $item['wali_nik'] == $w['nik_wali'] ? 'selected' : '' ?>><?= $w['nik_wali'] ?> - <?= $w['nama_lengkap'] ?></option>
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