<?= $this->extend('layouts/layout') ?>
<?= $this->section('content') ?>

    <!--begin::Basic info-->
    <div class="card mb-5 mb-xl-10">
        <!--begin::Content-->
        <div id="kt_account_settings_profile_details" class="collapse show">
            <?= form_open('pengajar/update/profile/' . $pengajar['nip_pengajar']); ?>
            <?= csrf_field(); ?>
            <?= form_hidden('_method', 'PUT'); ?>

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
                               value="<?= old('nip_pengajar') ?? $pengajar['nip_pengajar'] ?>" required disabled/>
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
                               value="<?= old('nama_lengkap') ?? $pengajar['nama_lengkap'] ?>" required/>
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
                                   value="L" <?= old('jk') || $pengajar['jk'] != "P" ? 'checked' : '' ?>/>
                            <span class="form-check-label">Laki-laki</span>
                        </label>
                    </div>
                    <div class="invalid-feedback">
                        <?= validation_show_error('jk'); ?>
                    </div>
                    <div class="col-lg fv-row">
                        <label class="form-check form-check-custom form-check-solid">
                            <input class="form-check-input" name="jk" type="radio"
                                   value="P" <?= old('jk') || $pengajar['jk'] == "P" ? 'checked' : '' ?>/>
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
                    <div class="col-lg-4 fv-row">
                        <input type="number" name="no_hp"
                               class="form-control form-control-lg form-control-solid <?= validation_show_error('no_hp') ? 'is-invalid' : ''; ?>"
                               placeholder="No. HP pengajar"
                               value="<?= old('no_hp') ?? $pengajar['no_hp'] ?>" required/>
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
                        <input type="text" name="jabatan"
                               class="form-control form-control-lg form-control-solid <?= validation_show_error('jabatan') ? 'is-invalid' : ''; ?>"
                               placeholder="Jabatan"
                               value="<?= old('jabatan') ?? $pengajar['jabatan'] ?>" required/>
                        <div class="invalid-feedback">
                            <?= validation_show_error('jabatan'); ?>
                        </div>
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->
            </div>
            <!--end::Card body-->
            <!--begin::Actions-->
            <div class="card-footer d-flex justify-content-end py-6 px-9">
                <button type="reset" class="btn btn-light btn-active-light-primary me-2">Batal</button>
                <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">Simpan
                </button>
            </div>
            <!--end::Actions-->
            <?= form_close(); ?>
        </div>
        <!--end::Content-->
    </div>


    <!--begin::Basic info-->
    <div class="card mb-5 mb-xl-10">
        <!--begin::Content-->
        <div id="kt_account_settings_profile_details" class="collapse show">
            <?= form_open('pengajar/store'); ?>
            <?= csrf_field(); ?>
            <!--begin::Card body-->
            <div class="card-body border-top p-9">

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
                               value="<?= old('username') ?? $pengajar['username'] ?>" required disabled/>
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
                               value="<?= old('email') ?? $pengajar['email'] ?>" required disabled/>
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
                <button type="reset" class="btn btn-light btn-active-light-primary me-2">Batal</button>
                <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">Simpan
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