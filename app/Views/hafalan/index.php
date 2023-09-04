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

                    <!--begin::Filter-->
                    <button type="button" class="btn btn-light-primary me-3" data-kt-menu-trigger="click"
                            data-kt-menu-placement="bottom-end">
                        <i class="ki-outline ki-filter fs-2"></i>Filter
                    </button>
                    <!--begin::Menu 1-->
                    <div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true">
                        <!--begin::Header-->
                        <div class="px-7 py-5">
                            <div class="fs-5 text-dark fw-bold">Filter Options</div>
                        </div>
                        <!--end::Header-->
                        <!--begin::Separator-->
                        <div class="separator border-gray-200"></div>
                        <!--end::Separator-->
                        <!--begin::Content-->
                        <form class="px-7 py-5" data-kt-user-table-filter="form" method="get"
                              action="<?= base_url('hafalan/filter') ?>">
                            <!--begin::Input group-->
                            <div class="mb-10">
                                <label class="form-label fs-6 fw-semibold">Santri:</label>
                                <select class="form-select form-select-solid fw-bold" data-kt-select2="true"
                                        name="nis_santri"
                                        data-placeholder="Pilih santri" data-allow-clear="true"
                                        data-kt-user-table-filter="role" data-hide-search="true">
                                    <option></option>
                                    <?php foreach ($santri as $v) : ?>
                                        <option value="<?= $v['nis_santri'] ?>"><?= $v['nama_lengkap'] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <!--end::Input group-->
                            <!--begin::Actions-->
                            <div class="d-flex justify-content-end">
                                <button type="reset"
                                        class="btn btn-light btn-active-light-primary fw-semibold me-2 px-6"
                                        data-kt-menu-dismiss="true" data-kt-user-table-filter="reset">Reset
                                </button>
                                <button type="submit" class="btn btn-primary fw-semibold px-6"
                                        data-kt-menu-dismiss="true" data-kt-user-table-filter="filter">Apply
                                </button>
                            </div>
                            <!--end::Actions-->
                        </form>
                        <!--end::Content-->
                    </div>
                    <!--end::Menu 1-->

                    <?php if (hasActionAccess('create', user_id()) && in_groups('Pengajar')) : ?>
                        <!--begin::Add user-->
                        <button type="button" class="btn btn-light-success" data-bs-toggle="modal"
                                data-bs-target="#kt_modal_add_user">
                            <i class="ki-outline ki-plus-square fs-3"></i>Tambah Data
                        </button>
                        <!--end::Add user-->
                    <?php endif ?>
                </div>
                <!--end::Toolbar-->
                <?php if (hasActionAccess('create', user_id()) && in_groups('Pengajar')) : ?>
                    <!--begin::Modal - Add task-->
                    <div class="modal fade" id="kt_modal_add_user" tabindex="-1" aria-hidden="true">
                        <!--begin::Modal dialog-->
                        <div class="modal-dialog modal-dialog-centered mw-650px">
                            <!--begin::Modal content-->
                            <div class="modal-content">
                                <!--begin::Modal header-->
                                <div class="modal-header" id="kt_modal_add_user_header">
                                    <!--begin::Modal title-->
                                    <h2 class="fw-bold">Tambah Hafalan</h2>
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
                                    <form action="<?= base_url('hafalan/store') ?>" method="post">
                                        <?= csrf_field() ?>
                                        <?= form_hidden('pengajar_nip', $pengajar['nip_pengajar']) ?>
                                        <!--begin::Scroll-->
                                        <div class="d-flex flex-column scroll-y me-n7 pe-7"
                                             id="kt_modal_add_user_scroll"
                                             data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}"
                                             data-kt-scroll-max-height="auto"
                                             data-kt-scroll-dependencies="#kt_modal_add_user_header"
                                             data-kt-scroll-wrappers="#kt_modal_add_user_scroll"
                                             data-kt-scroll-offset="300px">
                                            <!--begin::Input group-->
                                            <div class="fv-row mb-7">
                                                <!--begin::Label-->
                                                <label class="required fw-semibold fs-6 mb-2">Santri</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <select class="form-select form-select-solid" data-control="select2"
                                                        data-placeholder="Pilih Santri"
                                                        name="santri_nis" id="santri_nis"
                                                        data-dropdown-parent="#kt_modal_add_user"
                                                        data-allow-clear="true" required>
                                                    <option></option>
                                                    <?php foreach ($santri as $item) : ?>
                                                        <option value="<?= $item['nis_santri'] ?>"><?= $item['nis_santri'] . ' - ' . $item['nama_lengkap'] ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="fv-row mb-7">
                                                <!--begin::Label-->
                                                <label class="required fw-semibold fs-6 mb-2">Surat</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <select class="form-select form-select-solid" data-control="select2"
                                                        data-placeholder="Pilih Surat"
                                                        name="surah" id="surah"
                                                        data-dropdown-parent="#kt_modal_add_user"
                                                        data-allow-clear="true" required>
                                                    <option></option>
                                                    <?php foreach (NAMA_SURAH as $item) : ?>
                                                        <option value="<?= $item ?>"><?= $item ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="fv-row mb-7">
                                                <!--begin::Label-->
                                                <label class="fw-semibold fs-6 mb-2 required">Ayat</label>
                                                <!--end::Label-->
                                                <!--                                            <div class="col-3">-->
                                                <!--begin::Input-->
                                                <input type="number" name="ayat_awal" id="ayat_awal"
                                                       placeholder="Ayat ke"
                                                       class="form-control form-control-solid mb-3 mb-lg-3" required/>
                                                <!--end::Input-->
                                                <!--                                            </div>-->
                                                <!--                                            <div class="col-3">-->
                                                <!--begin::Input-->
                                                <input type="number" name="ayat_akhir" id="ayat_akhir"
                                                       placeholder="Sampai"
                                                       class="form-control form-control-solid mb-3 mb-lg-0" required/>
                                                <!--end::Input-->
                                                <!--                                            </div>-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="fv-row mb-7">
                                                <!--begin::Label-->
                                                <label class="fw-semibold fs-6 mb-2 required">Tanggal</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="date" name="tanggal" id="tanggal"
                                                       placeholder="Masukkan email santri" value="<?= date('Y-m-d') ?>"
                                                       class="form-control form-control-solid mb-3 mb-lg-0" required/>
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="fv-row mb-7">
                                                <!--begin::Label-->
                                                <label class="fw-semibold fs-6 mb-2 required">Link Kegiatan</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" name="link_kegiatan" id="link_kegiatan"
                                                       placeholder="Masukkan link dokumentasi kegiatan"
                                                       class="form-control form-control-solid mb-3 mb-lg-0"/>
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="fv-row mb-7">
                                                <!--begin::Label-->
                                                <label class="fw-semibold fs-6 mb-2 required">Keterangan</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" name="keterangan" id="keterangan"
                                                       placeholder="Masukkan keterangan"
                                                       class="form-control form-control-solid mb-3 mb-lg-0"/>
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
                                            <button type="submit" class="btn btn-success"
                                                    data-kt-users-modal-action="submit">
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
                <?php endif; ?>
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
                    <th class="min-w-125px">NIS</th>
                    <th class="min-w-75px">Surat</th>
                    <th class="min-w-100px">Tanggal</th>
                    <th class="min-w-100px">Kegiatan</th>
                    <?php if (hasActionAccess('write', user_id())): ?>
                        <th class="text-end min-w-100px">Actions</th>
                    <?php endif; ?>
                </tr>
                </thead>
                <tbody class="text-gray-600 fw-semibold">
                <?php foreach ($hafalan as $item) : ?>
                    <tr>
                        <td class="d-flex align-items-center">
                            <div class="d-flex flex-column">
                                <span class="text-gray-800 text-hover-success mb-1"><?= $item['santri_nis'] ?></span>
                                <span><?= $item['nama_santri'] ?></span>
                                <span class="badge badge-light-<?= COLOR[$item['kelas_id'] % count(COLOR)] ?> fw-bolder"><?= $item['kelas'] ?></span>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex flex-column">
                                <span class="text-gray-800"><?= $item['surah'] ?></span>
                                <span><?= $item['ayat_awal'] . ' - ' . $item['ayat_akhir'] ?></span>
                                <span><?= 'Oleh: ' . $item['nama_pengajar'] ?></span>
                            </div>
                        </td>
                        <td><?= date('d M Y', strtotime($item['tanggal'])) ?></td>
                        <td>
                            <div class="d-flex flex-column">
                                <a href="<?= $item['link_kegiatan'] ?>" class="text-success" target="_blank"><?= $item['link_kegiatan'] ?></a>
                                <span><?= $item['keterangan'] ?></span>
                            </div>
                        </td>

                        <?php if (hasActionAccess('write', user_id())): ?>
                        <td class="text-end">
                            <a class="btn btn-light btn-active-light-success btn-flex btn-center btn-sm"
                               data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                <i class="ki-outline ki-down fs-5 ms-1"></i></a>
                            <!--begin::Menu-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-success fw-semibold fs-7 w-125px py-4"
                                 data-kt-menu="true">
                                <?php if (in_groups('Pengajar')) : ?>
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a class="menu-link px-3" data-bs-toggle="modal"
                                           data-bs-target="#kt_modal_update_user_<?= $item['id_hafalan'] ?>">Update</a>
                                    </div>
                                    <!--end::Menu item-->
                                <?php endif; ?>
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="<?= base_url('hafalan/delete/' . $item['id_hafalan']) ?>"
                                       class="menu-link px-3"
                                       onclick="return confirm('Data akan dihapus, yakin?')">Delete</a>
                                </div>
                                <!--end::Menu item-->
                            </div>
                            <!--end::Menu-->
                            <?php endif; ?>
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
<?php if (hasActionAccess('create', user_id()) && in_groups('Pengajar')) : ?>
    <?php foreach ($hafalan as $item) : ?>
        <!--begin::Modal - Add task-->
        <div class="modal fade" id="kt_modal_update_user_<?= $item['id_hafalan'] ?>" tabindex="-1" aria-hidden="true">
            <!--begin::Modal dialog-->
            <div class="modal-dialog modal-dialog-centered mw-650px">
                <!--begin::Modal content-->
                <div class="modal-content">
                    <!--begin::Modal header-->
                    <div class="modal-header" id="kt_modal_add_user_header">
                        <!--begin::Modal title-->
                        <h2 class="fw-bold">Ubah Hafalan</h2>
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
                        <form action="<?= base_url('hafalan/store') ?>" method="post">
                            <?= csrf_field() ?>
                            <?= form_hidden('id_hafalan', $item['id_hafalan']) ?>
                            <?= form_hidden('pengajar_nip', $pengajar['nip_pengajar']) ?>
                            <!--begin::Scroll-->
                            <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_user_scroll"
                                 data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}"
                                 data-kt-scroll-max-height="auto"
                                 data-kt-scroll-dependencies="#kt_modal_add_user_header"
                                 data-kt-scroll-wrappers="#kt_modal_add_user_scroll"
                                 data-kt-scroll-offset="300px">
                                <!--begin::Input group-->
                                <div class="fv-row mb-7">
                                    <!--begin::Label-->
                                    <label class="required fw-semibold fs-6 mb-2">Santri</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <select class="form-select form-select-solid" data-control="select2"
                                            data-placeholder="Pilih Santri"
                                            name="santri_nis" id="santri_nis"
                                            data-dropdown-parent="#kt_modal_update_user_<?= $item['id_hafalan'] ?>"
                                            data-allow-clear="true" required>
                                        <option></option>
                                        <?php foreach ($santri as $s) : ?>
                                            <option value="<?= $s['nis_santri'] ?>" <?= $item['santri_nis'] == $s['nis_santri'] ? 'selected' : '' ?>><?= $s['nis_santri'] . ' - ' . $s['nama_lengkap'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="fv-row mb-7">
                                    <!--begin::Label-->
                                    <label class="required fw-semibold fs-6 mb-2">Surat</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <select class="form-select form-select-solid" data-control="select2"
                                            data-placeholder="Pilih Surat"
                                            name="surah" id="surah"
                                            data-dropdown-parent="#kt_modal_update_user_<?= $item['id_hafalan'] ?>"
                                            data-allow-clear="true" required>
                                        <option></option>
                                        <?php foreach (NAMA_SURAH as $v) : ?>
                                            <option value="<?= $v ?>" <?= $item['surah'] == $v ? 'selected' : '' ?>><?= $v ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="fv-row mb-7">
                                    <!--begin::Label-->
                                    <label class="fw-semibold fs-6 mb-2 required">Ayat</label>
                                    <!--end::Label-->
                                    <!--                                            <div class="col-3">-->
                                    <!--begin::Input-->
                                    <input type="number" name="ayat_awal" id="ayat_awal"
                                           placeholder="Ayat ke" value="<?= $item['ayat_awal'] ?>"
                                           class="form-control form-control-solid mb-3 mb-lg-3" required/>
                                    <!--end::Input-->
                                    <!--                                            </div>-->
                                    <!--                                            <div class="col-3">-->
                                    <!--begin::Input-->
                                    <input type="number" name="ayat_akhir" id="ayat_akhir"
                                           placeholder="Sampai" value="<?= $item['ayat_akhir'] ?>"
                                           class="form-control form-control-solid mb-3 mb-lg-0" required/>
                                    <!--end::Input-->
                                    <!--                                            </div>-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="fv-row mb-7">
                                    <!--begin::Label-->
                                    <label class="fw-semibold fs-6 mb-2 required">Tanggal</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="date" name="tanggal" id="tanggal"
                                           placeholder="Masukkan email santri"
                                           value="<?= date('Y-m-d', strtotime($item['tanggal'])) ?>"
                                           class="form-control form-control-solid mb-3 mb-lg-0" required/>
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="fv-row mb-7">
                                    <!--begin::Label-->
                                    <label class="fw-semibold fs-6 mb-2 required">Link Kegiatan</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" name="link_kegiatan" id="link_kegiatan"
                                           placeholder="Masukkan link dokumentasi kegiatan" value="<?= $item['link_kegiatan'] ?>"
                                           class="form-control form-control-solid mb-3 mb-lg-0"/>
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="fv-row mb-7">
                                    <!--begin::Label-->
                                    <label class="fw-semibold fs-6 mb-2 required">Keterangan</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" name="keterangan" id="keterangan"
                                           placeholder="Masukkan keterangan" value="<?= $item['keterangan'] ?>"
                                           class="form-control form-control-solid mb-3 mb-lg-0"/>
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
                                <button type="submit" class="btn btn-success"
                                        data-kt-users-modal-action="submit">
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
    <?php endforeach; ?>
<?php endif ?>
<?= $this->endSection(); ?>