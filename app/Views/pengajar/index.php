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
    <div class="card card-flush mb-10">
        <!--begin::Card header-->
        <div class="card-header mt-6">
            <!--begin::Card title-->
            <div class="card-title">
                <h1>Ketua Pengajar</h1>
            </div>
            <!--end::Card title-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body pt-0">
            <div class="row mb-6">
                <?php if ($ketua != null) : ?>
                    <!--begin::Label-->
                    <label class="col-lg-2 col-form-label required fw-semibold fs-6"><?= $ketua['nip_pengajar'] ?>
                        - <?= $ketua['nama_lengkap'] ?></label>
                    <!--end::Label-->
                <?php else : ?>
                    <!--begin::Label-->
                    <label class="col-lg col-form-label required fw-semibold fs-6">Belum ada ketua pengajar</label>
                    <!--end::Label-->
                <?php endif ?>
            </div>
        </div>
        <!--end::Card body-->
    </div>
    <!--end::Card-->
    <!--begin::Card-->
    <div class="card card-flush">
        <!--begin::Card header-->
        <div class="card-header mt-6">
            <!--begin::Card title-->
            <div class="card-title">
                <!--begin::Search-->
                <div class="d-flex align-items-center position-relative my-1 me-5">
                    <i class="ki-outline ki-magnifier fs-3 position-absolute ms-5"></i>
                    <input type="text" data-kt-menus-table-filter="search"
                           class="form-control form-control-solid w-250px ps-13" placeholder="Cari .."/>
                </div>
                <!--end::Search-->
            </div>
            <!--end::Card title-->
            <!--begin::Card toolbar-->
            <div class="card-toolbar">
                <?php if (hasActionAccess('create', user_id())): ?>
                    <!--begin::Button-->
                    <a href="<?= base_url('pengajar/create') ?>" class="btn btn-light-primary">
                        <i class="ki-outline ki-plus-square fs-3"></i>Tambah Pengajar
                    </a>
                    <!--end::Button-->
                <?php endif; ?>
            </div>
            <!--end::Card toolbar-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body pt-0">
            <!--begin::Table-->
            <table class="table align-middle table-row-dashed fs-6 gy-5 mb-0" id="kt_menus_table">
                <thead>
                <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                    <th class="min-w-125px">NIP</th>
                    <th class="min-w-150px">Jabatan</th>
                    <th class="min-w-50px">Jenis Kelamin</th>
                    <th class="min-w-50px">No. Hp</th>
                    <th class="min-w-100px">Dibuat</th>
                    <th class="min-w-100px">Diubah</th>
                    <?php if (hasActionAccess('write', user_id())): ?>
                        <th class="text-end min-w-100px">Actions</th>
                    <?php endif; ?>
                </tr>
                </thead>
                <tbody class="fw-semibold text-gray-600">
                <?php foreach ($pengajar as $item) : ?>
                    <tr>
                        <td class="d-flex align-items-center">
                            <div class="d-flex flex-column">
                                <a href="<?= base_url('pengajar/update/' . $item['nip_pengajar']) ?>"
                                   class="text-gray-800 text-hover-primary mb-1"><?= $item['nip_pengajar'] ?></a>
                                <span><?= $item['nama_lengkap'] ?></span>
                            </div>
                        </td>
                        <td><?= $item['jabatan'] ?></td>
                        <td><?= $item['jk'] == 'L' ? 'Laki-laki' : 'Perempuan' ?></td>
                        <td><?= $item['no_hp'] ?></td>
                        <td><?= date('d M Y', strtotime($item['created_at'])) ?></td>
                        <td><?= date('d M Y', strtotime($item['updated_at'])) ?></td>
                        <?php if (hasActionAccess('write', user_id())): ?>
                            <td class="text-end">
                                <a href="<?= base_url('pengajar/update/' . $item['nip_pengajar']) ?>"
                                   class="btn btn-icon btn-active-light-primary w-30px h-30px">
                                    <i class="ki-outline ki-setting-3 fs-3"></i>
                                </a>
                                <a href="<?= base_url('pengajar/delete/' . $item['nip_pengajar']) ?>"
                                   class="btn btn-icon btn-active-light-danger w-30px h-30px"
                                   onclick="return confirm('Data akan dihapus, anda yakin?')">
                                    <i class="ki-outline ki-trash fs-3"></i>
                                </a>
                                <a href="<?= base_url('pengajar/ketua/' . $item['nip_pengajar']) ?>"
                                   class="btn btn-icon btn-active-light-success w-30px h-30px"
                                   onclick="return confirm('Pengguna akan dijadikan ketua, lanjutkan?')">
                                    <i class="ki-outline ki-book fs-3"></i>
                                </a>
                            </td>
                        <?php endif; ?>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            <!--end::Table-->
        </div>
        <!--end::Card body-->
    </div>
    <!--end::Card-->

    <!--begin::Modals-->
    <!--end::Modals-->

<?= $this->endSection(); ?>