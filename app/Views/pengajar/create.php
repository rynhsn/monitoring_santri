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

    <!--begin::Basic info-->
    <div class="card mb-5 mb-xl-10">
        <!--begin::Content-->
        <div id="kt_account_settings_profile_details" class="collapse show">
            <?= form_open('pengajar/store'); ?>
            <?= csrf_field(); ?>
            <!--begin::Card body-->
            <div class="card-body border-top p-9">
                <!--begin::Input group-->
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-2 col-form-label required fw-semibold fs-6">NIP Pengajar</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-10 fv-row">
                        <input type="number" name="nip_pengajar"
                               class="form-control form-control-lg form-control-solid <?= validation_show_error('nip_pengajar') ? 'is-invalid' : ''; ?>"
                               placeholder="Masukkan NIP Pengajar"
                               value="<?= old('nip_pengajar') ?>" required minlength="9" maxlength="9"/>
                        <div class="invalid-feedback">
                            <?= validation_show_error('nip_pengajar'); ?>
                        </div>
                    </div>

                    <!--end::Col-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-2 col-form-label required fw-semibold fs-6">Nama Pengajar</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-10 fv-row">
                        <input type="text" name="nama_lengkap"
                               class="form-control form-control-lg form-control-solid <?= validation_show_error('nama_lengkap') ? 'is-invalid' : ''; ?>"
                               placeholder="Nama lengkap pengajar"
                               value="<?= old('nama_lengkap') ?>" required/>
                        <div class="invalid-feedback">
                            <?= validation_show_error('nama_lengkap'); ?>
                        </div>
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-2 col-form-label required fw-semibold fs-6">Jenis Kelamin</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-2 fv-row">
                        <label class="form-check form-check-custom form-check-solid">
                            <input class="form-check-input" name="jk" type="radio"
                                   value="L" <?= old('jk') != "P" ? 'checked' : '' ?>/>
                            <span class="form-check-label">Laki-laki</span>
                        </label>
                    </div>
                    <div class="invalid-feedback">
                        <?= validation_show_error('jk'); ?>
                    </div>
                    <div class="col-lg fv-row">
                        <label class="form-check form-check-custom form-check-solid">
                            <input class="form-check-input" name="jk" type="radio"
                                   value="P" <?= old('jk') == "P" ? 'checked' : '' ?>/>
                            <span class="form-check-label">Perempuan</span>
                        </label>
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-2 col-form-label required fw-semibold fs-6">No. HP</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-3 fv-row">
                        <input type="number" name="no_hp"
                               class="form-control form-control-lg form-control-solid <?= validation_show_error('no_hp') ? 'is-invalid' : ''; ?>"
                               placeholder="No. HP pengajar"
                               value="<?= old('no_hp') ?>" required/>
                        <div class="invalid-feedback">
                            <?= validation_show_error('no_hp'); ?>
                        </div>
                    </div>
                    <!--end::Col-->

                    <!--begin::Label-->
                    <label class="col-lg col-form-label required fw-semibold fs-6">Jabatan</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-5 fv-row">
<!--                        <input type="text" name="jabatan"-->
<!--                               class="form-control form-control-lg form-control-solid --><?php //= validation_show_error('jabatan') ? 'is-invalid' : ''; ?><!--"-->
<!--                               placeholder="Jabatan"-->
<!--                               value="--><?php //= old('jabatan') ?><!--" required/>-->
                        <select class="form-select form-select-solid <?= validation_show_error('jabatan') ? 'is-invalid' : ''; ?>" data-control="select2"
                                data-placeholder="Pilih Jabatan"
                                name="jabatan" id="jabatan"
                                data-allow-clear="true" required>
                            <option></option>
                            <option value="Pengajar Bahasa">Pengajar Bahasa</option>
                            <option value="Pengajar Tahfidz">Pengajar Tahfidz</option>
                        </select>
                        <div class="invalid-feedback">
                            <?= validation_show_error('jabatan'); ?>
                        </div>
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->

                <hr>

                <!--begin::Input group-->
                <div class="row mb-6 mt-10">
                    <!--begin::Label-->
                    <label class="col-lg-2 col-form-label required fw-semibold fs-6">Username</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-10 fv-row">
                        <input type="text" name="username"
                               class="form-control form-control-lg form-control-solid <?= validation_show_error('username') ? 'is-invalid' : ''; ?>"
                               placeholder="Username pengajar"
                               value="<?= old('username') ?>" required/>
                        <div class="invalid-feedback">
                            <?= validation_show_error('username'); ?>
                        </div>
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-2 col-form-label required fw-semibold fs-6">Email</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-10 fv-row">
                        <input type="email" name="email"
                               class="form-control form-control-lg form-control-solid <?= validation_show_error('email') ? 'is-invalid' : ''; ?>"
                               placeholder="Email pengajar"
                               value="<?= old('email') ?>" required/>
                        <div class="invalid-feedback">
                            <?= validation_show_error('email'); ?>
                        </div>
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-2 col-form-label required fw-semibold fs-6">Password</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-10 fv-row">
                        <input type="password" name="password"
                               class="form-control form-control-lg form-control-solid <?= validation_show_error('password') ? 'is-invalid' : ''; ?>"
                               placeholder="Password pengajar"
                               value="<?= old('password') ?>" required/>
                        <div class="invalid-feedback">
                            <?= validation_show_error('password'); ?>
                        </div>
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-2 col-form-label required fw-semibold fs-6">Ulang Password</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-10 fv-row">
                        <input type="password" name="pass_confirm"
                               class="form-control form-control-lg form-control-solid <?= validation_show_error('pass_confirm') ? 'is-invalid' : ''; ?>"
                               placeholder="Ulangi password pengajar"
                               value="<?= old('pass_confirm') ?>" required/>
                        <div class="invalid-feedback">
                            <?= validation_show_error('pass_confirm'); ?>
                        </div>
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->
            </div>
            <!--end::Card body-->
            <!--begin::Actions-->
            <div class="card-footer d-flex justify-content-end py-6 px-9">
                <button type="reset" class="btn btn-light btn-active-light-success me-2">Batal</button>
                <button type="submit" class="btn btn-success" id="kt_account_profile_details_submit">Simpan
                </button>
            </div>
            <!--end::Actions-->
            <?= form_close(); ?>
            <!--end::Form-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Basic info-->

<?= $this->endSection(); ?>