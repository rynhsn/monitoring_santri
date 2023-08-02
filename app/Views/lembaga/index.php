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


    <!--begin::Row-->
    <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
        <!--begin::Col-->
        <div class="col-xl-6">
            <!--begin::Card widget 17-->
            <div class="card h-100">
                <!--begin::Header-->
                <div class="card-header pt-5">
                    <!--begin::Title-->
                    <div class="card-title d-flex flex-column">
                        <!--begin::Info-->
                        <div class="d-flex align-items-center">
                            <!--begin::Amount-->
                            <span
                                class="fs-2hx fw-bold text-dark me-2 lh-1 ls-n2">Visi</span>
                            <!--end::Amount-->
                        </div>
                        <!--end::Info-->
                    </div>
                    <!--end::Title-->
                </div>
                <!--end::Header-->
                <?= form_open('/lembaga/store'); ?>
                <?= csrf_field(); ?>
                <?= form_hidden('misi', $lembaga['misi']); ?>
                <?= form_hidden('sejarah', $lembaga['sejarah']); ?>
                <!--begin::Card body-->
                <div class="card-body pt-2 pb-4 d-flex flex-wrap align-items-center mt-10">
                    <!--begin::Input group-->
                    <div class="fv-row col-12 mb-6">
                        <textarea name="visi" id="kt_docs_ckeditor_visi"><?= $lembaga['visi'] ?></textarea>
                    </div>
                    <!--end::Input group-->
                </div>
                <!--end::Card body-->
                <!--begin::Actions-->
                <div class="card-footer d-flex justify-content-end py-6 px-9">
                    <button type="reset" class="btn btn-light btn-active-light-primary me-2" onclick="window.location.reload();">Batal</button>

                    <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">Simpan
                    </button>
                </div>
                <!--end::Actions-->
                <?= form_close(); ?>
                <!--end::Form-->
            </div>
            <!--end::Card widget 17-->
        </div>
        <!--end::Col-->
        <!--begin::Col-->
        <div class="col-xl-6">
            <!--begin::Card widget 10-->
            <div class="card card-flush h-md-100">
                <!--begin::Header-->
                <div class="card-header pt-5">
                    <!--begin::Title-->
                    <div class="card-title d-flex flex-column">
                        <!--begin::Amount-->
                        <span class="fs-2hx fw-bold text-dark me-2 lh-1 ls-n2">Visi</span>
                        <!--end::Amount-->
                    </div>
                    <!--end::Title-->
                </div>
                <!--end::Header-->
                <!--begin::Card body-->
                <div class="card-body pt-0" id="preview_visi">
                    <!--begin::Wrapper-->
                    <?= $lembaga['visi'] ?>
                    <!--end::Wrapper-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card widget 10-->
        </div>
    </div>
    <!--end::Row-->
    <!--begin::Row-->
    <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
        <!--begin::Col-->
        <div class="col-xl-6">
            <!--begin::Card widget 17-->
            <div class="card h-100">
                <!--begin::Header-->
                <div class="card-header pt-5">
                    <!--begin::Title-->
                    <div class="card-title d-flex flex-column">
                        <!--begin::Info-->
                        <div class="d-flex align-items-center">
                            <!--begin::Amount-->
                            <span
                                class="fs-2hx fw-bold text-dark me-2 lh-1 ls-n2">Misi</span>
                            <!--end::Amount-->
                        </div>
                        <!--end::Info-->
                    </div>
                    <!--end::Title-->
                </div>
                <!--end::Header-->
                <?= form_open('/lembaga/store'); ?>
                <?= csrf_field(); ?>
                <?= form_hidden('visi', $lembaga['visi']); ?>
                <?= form_hidden('sejarah', $lembaga['sejarah']); ?>
                <!--begin::Card body-->
                <div class="card-body pt-2 pb-4 d-flex flex-wrap align-items-center mt-10">
                    <!--begin::Input group-->
                    <div class="fv-row col-12 mb-6">
                        <textarea name="misi" id="kt_docs_ckeditor_misi"><?= $lembaga['misi'] ?></textarea>
                    </div>
                    <!--end::Input group-->
                </div>
                <!--end::Card body-->
                <!--begin::Actions-->
                <div class="card-footer d-flex justify-content-end py-6 px-9">
                    <button type="reset" class="btn btn-light btn-active-light-primary me-2" onclick="window.location.reload();">Batal</button>

                    <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">Simpan
                    </button>
                </div>
                <!--end::Actions-->
                <?= form_close(); ?>
                <!--end::Form-->
            </div>
            <!--end::Card widget 17-->
        </div>
        <!--end::Col-->
        <!--begin::Col-->
        <div class="col-xl-6">
            <!--begin::Card widget 10-->
            <div class="card card-flush h-md-100">
                <!--begin::Header-->
                <div class="card-header pt-5">
                    <!--begin::Title-->
                    <div class="card-title d-flex flex-column">
                        <!--begin::Amount-->
                        <span class="fs-2hx fw-bold text-dark me-2 lh-1 ls-n2">Misi</span>
                        <!--end::Amount-->
                    </div>
                    <!--end::Title-->
                </div>
                <!--end::Header-->
                <!--begin::Card body-->
                <div class="card-body pt-0" id="preview_misi">
                    <!--begin::Wrapper-->
                    <?= $lembaga['misi'] ?>
                    <!--end::Wrapper-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card widget 10-->
        </div>
    </div>
    <!--end::Row-->
    <!--begin::Row-->
    <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
        <!--begin::Col-->
        <div class="col-xl-6">
            <!--begin::Card widget 17-->
            <div class="card h-100">
                <!--begin::Header-->
                <div class="card-header pt-5">
                    <!--begin::Title-->
                    <div class="card-title d-flex flex-column">
                        <!--begin::Info-->
                        <div class="d-flex align-items-center">
                            <!--begin::Amount-->
                            <span
                                class="fs-2hx fw-bold text-dark me-2 lh-1 ls-n2">Sejarah</span>
                            <!--end::Amount-->
                        </div>
                        <!--end::Info-->
                    </div>
                    <!--end::Title-->
                </div>
                <!--end::Header-->
                <?= form_open('/lembaga/store'); ?>
                <?= csrf_field(); ?>
                <?= form_hidden('visi', $lembaga['visi']); ?>
                <?= form_hidden('misi', $lembaga['misi']); ?>
                <!--begin::Card body-->
                <div class="card-body pt-2 pb-4 d-flex flex-wrap align-items-center mt-10">
                    <!--begin::Input group-->
                    <div class="fv-row col-12 mb-6">
                        <textarea name="sejarah" id="kt_docs_ckeditor_sejarah"><?= $lembaga['sejarah'] ?></textarea>
                    </div>
                    <!--end::Input group-->
                </div>
                <!--end::Card body-->
                <!--begin::Actions-->
                <div class="card-footer d-flex justify-content-end py-6 px-9">
                    <button type="reset" class="btn btn-light btn-active-light-primary me-2" onclick="window.location.reload();">Batal</button>

                    <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">Simpan
                    </button>
                </div>
                <!--end::Actions-->
                <?= form_close(); ?>
                <!--end::Form-->
            </div>
            <!--end::Card widget 17-->
        </div>
        <!--end::Col-->
        <!--begin::Col-->
        <div class="col-xl-6">
            <!--begin::Card widget 10-->
            <div class="card card-flush h-md-100">
                <!--begin::Header-->
                <div class="card-header pt-5">
                    <!--begin::Title-->
                    <div class="card-title d-flex flex-column">
                        <!--begin::Amount-->
                        <span class="fs-2hx fw-bold text-dark me-2 lh-1 ls-n2">Sejarah</span>
                        <!--end::Amount-->
                    </div>
                    <!--end::Title-->
                </div>
                <!--end::Header-->
                <!--begin::Card body-->
                <div class="card-body pt-0" id="preview_sejarah">
                    <!--begin::Wrapper-->
                    <?= $lembaga['sejarah'] ?>
                    <!--end::Wrapper-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card widget 10-->
        </div>
    </div>
    <!--end::Row-->
<?= $this->endSection(); ?>