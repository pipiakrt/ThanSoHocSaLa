<style>
.background-position-center {
    background-position: center
}
.tab-pane {
    overflow: hidden;
}
</style>

<template>
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <Breadcrumb :data="subHeader" />
    <div class="d-flex flex-column-fluid">
        <div class="container">
            <div class="card card-custom gutter-b">
                <div class="card-header card-header-tabs-line">
                    <div class="card-toolbar">
                        <ul class="nav nav-tabs nav-bold nav-tabs-line">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#kt_tab_pane_1_4">
                                    <span class="nav-icon"><i class="flaticon2-gear"></i></span>
                                    <h3 class="card-title">Thông tin chung</h3>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#kt_tab_pane_2_6">
                                    <span class="nav-icon"><i class="flaticon2-pen"></i></span>
                                    <h3 class="card-title">Nội dung</h3>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#kt_tab_pane_2_4">
                                    <span class="nav-icon"><i class="flaticon2-sheet"></i></span>
                                    <h3 class="card-title">Chi tiết sản phẩm</h3>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#kt_tab_pane_2_5">
                                    <span class="nav-icon"><i class="flaticon2-drop"></i></span>
                                    <h3 class="card-title">Seo</h3>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#kt_tab_pane_2_7">
                                    <span class="nav-icon"><i class="flaticon2-graphic"></i></span>
                                    <h3 class="card-title">Khuyễn mãi</h3>
                                </a>
                            </li>
                            <li class="nav-item" @click="getApiProduct()">
                                <a class="nav-link" data-toggle="tab" href="#kt_tab_pane_2_8">
                                    <span class="nav-icon"><i class="flaticon2-list-2"></i></span>
                                    <h3 class="card-title">San phẩm gợi ý</h3>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <form ref="FormPost">
                        <ValidationObserver ref="errors">
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="kt_tab_pane_1_4" role="tabpanel" aria-labelledby="kt_tab_pane_1_4">
                                    <div class="form-group row">
                                        <label for="name" class="col-2 col-form-label">Tên</label>
                                        <div class="col-10">
                                            <validation-provider rules="required|length:0,255" v-slot="{ errors }">
                                                <input v-model="name" class="form-control" type="text" placeholder="Tên Sản phẩm" />
                                                <div v-if="errors[0]" class="invalid-feedback d-block" v-text="errors[0]"></div>
                                            </validation-provider>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="slug" class="col-2 col-form-label">URL</label>
                                        <div class="col-10">
                                            <validation-provider rules="required|length:0,255" v-slot="{ errors }">
                                                <input v-model="slug" class="form-control" type="search" placeholder="Đường dấn" />
                                                <div v-if="errors[0]" class="invalid-feedback d-block" v-text="errors[0]"></div>
                                            </validation-provider>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="categories" class="col-2 col-form-label">Danh mục</label>
                                        <div class="col-10">
                                            <validation-provider rules="required" v-slot="{ errors }">
                                                <select v-model="category" class="form-control" style="height: 35px">
                                                    <option value="" selected>Chọn danh mục</option>
                                                    <template v-for="item in categories">
                                                        <option :key="item.id" v-if="item.parent_id > 0" :value="item.id" v-text="item.name"></option>
                                                    </template>
                                                </select>
                                                <div v-if="errors[0]" class="invalid-feedback d-block" v-text="errors[0]"></div>
                                            </validation-provider>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="price" class="col-2 col-form-label">Giá bán</label>
                                        <div class="col-10">
                                            <validation-provider rules="required" v-slot="{ errors }">
                                                <input v-model="price" class="form-control" type="number" placeholder="Giá bán" />
                                                <div v-if="errors[0]" class="invalid-feedback d-block" v-text="errors[0]"></div>
                                            </validation-provider>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="number" class="col-2 col-form-label">Số lượng kho</label>
                                        <div class="col-10">
                                            <validation-provider rules="required" v-slot="{ errors }">
                                                <input v-model="number" class="form-control" type="number" placeholder="Số lượng" />
                                                <div v-if="errors[0]" class="invalid-feedback d-block" v-text="errors[0]"></div>
                                            </validation-provider>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-2 col-form-label">Ảnh Sản phẩm</label>
                                        <div class="col-10">
                                            <div class="row">
                                                <div class="col-2 mb-5" v-for="(item, key) in images" :key="key">
                                                    <div class="image-input image-input-outline" style="background-position: center; background-image: url(/img/no-image.png);">
                                                        <div class="image-input-wrapper background-position-center" :style="item.url ? { 'background-image': `url('${item.url}')` } : ''"></div>
                                                        <label @click="setTypeGetImg(key), modal = true" data-toggle="modal" data-target="#filemanager" class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change">
                                                            <i class="fa fa-pen icon-sm text-muted"></i>
                                                        </label>
                                                        <span v-if="item.url" @click="images.splice(key, 1)" class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="remove">
                                                            <i class="ki ki-bold-close icon-xs text-muted"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="col-2">
                                                    <div class="image-input image-input-outline" style="background-position: center; background-image: url(/img/no-image.png);">
                                                        <div class="image-input-wrapper"></div>
                                                        <label @click="setTypeGetImg(''), modal = true" data-toggle="modal" data-target="#filemanager" class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change">
                                                            <i class="fa fa-pen icon-sm text-muted"></i>
                                                        </label>
                                                    </div>
                                                    <div v-if="notImage" class="invalid-feedback d-block">Không được để trống</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="kt_tab_pane_2_4" role="tabpanel" aria-labelledby="kt_tab_pane_2_4">
                                    <div class="form-group row pb-5" v-for="(items, i) in attributes" :key="i"  style="border-bottom: 1px solid #e4e6ef;">
                                        <label for="video" class="col-2 col-form-label">Tiêu đề {{i + 1}}</label>
                                        <div class="col-10">
                                            <div class="row">
                                                <div class="col-12 mt-3">
                                                    <input v-model="items.title" placeholder="Tiêu đề" class="form-control" type="text" />
                                                </div>
                                                <div class="col-12">
                                                    <template v-for="(item, key) in items.options">
                                                        <div class="row mt-5" :key="key">
                                                            <div class="col-5">
                                                                <input v-model="item.key" placeholder="key" class="form-control" type="text" />
                                                            </div>
                                                            <div class="col-5">
                                                                <input v-model="item.val" placeholder="value" class="form-control" type="text" />
                                                            </div>
                                                            <div class="col-2">
                                                                <button type="button" @click="items.options.length == 1 ? attributes.splice(i, 1) : items.options.splice(key, 1)" class="btn btn-block btn-warning">Loại bỏ</button>
                                                            </div>
                                                        </div>
                                                    </template>
                                                </div>
                                                <div class="col-10 mt-5">
                                                    <button @click="items.options.push({key: '', val: ''})" type="button" class="btn btn-block btn-outline-secondary">Thêm</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button @click="attributes.push({title: '',options: [{ key: '', val: '', }] })" type="button" class="btn btn-block btn-outline-secondary">Thêm</button>
                                </div>
                                <div class="tab-pane fade" id="kt_tab_pane_2_6" role="tabpanel" aria-labelledby="kt_tab_pane_2_6">
                                    <div class="form-group row">
                                        <label for="video" class="col-10 col-form-label">Video</label>
                                        <div class="col-10">
                                            <input v-model="video" class="form-control" type="text" placeholder='Nhập đường link... vd: "https://youtu.be/l8v0hzD3llI"' />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="description" class="col-10 col-form-label">Mô tả</label>
                                        <div class="col-10">
                                            <textarea v-model="description" class="form-control" rows="9" id="description"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="kt_summernote_1" class="col-10 col-form-label">Nội dung</label>
                                        <div class="col-10">
                                            <div class="summernote" id="kt_summernote_1"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="kt_tab_pane_2_5" role="tabpanel" aria-labelledby="kt_tab_pane_2_5">
                                    <div class="form-group row">
                                        <label for="seo_title" class="col-2 col-form-label">Seo Title</label>
                                        <div class="col-10">
                                            <input v-model="seo_title" class="form-control" type="text" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="name" class="col-2 col-form-label">Seo Description</label>
                                        <div class="col-10">
                                            <textarea v-model="seo_description" class="form-control" rows="9" id="description"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="seo_keyword" class="col-2 col-form-label">Seo Keyword</label>
                                        <div class="col-10">
                                            <textarea v-model="seo_keyword" class="form-control" rows="9" id="description"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="kt_tab_pane_2_7" role="tabpanel" aria-labelledby="kt_tab_pane_2_7">
                                    <div class="form-group row">
                                        <label class="col-2">
                                            <button type="button" data-toggle="modal" data-target="#exampleModalLong" class="btn btn-primary mr-2" aria-haspopup="true" aria-expanded="false">
                                                <i class="icon-sm ki ki-plus"></i>Chọn khuyễn mãi
                                            </button>
                                        </label>
                                        <div v-if="promotion_id" class="col-10">
                                            <div class="card card-custom">
                                                <div class="card-body py-4">
                                                    <div class="form-group row my-2">
                                                        <label class="col-4 col-form-label">Mã KM:</label>
                                                        <div class="col-8">
                                                            <span class="form-control-plaintext font-weight-bolder">{{ promotion.title }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row my-2">
                                                        <label class="col-4 col-form-label">Tên KM:</label>
                                                        <div class="col-8">
                                                            <span class="form-control-plaintext font-weight-bolder">{{ promotion.title }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row my-2">
                                                        <label class="col-4 col-form-label">Mô tả:</label>
                                                        <div class="col-8">
                                                            <span class="form-control-plaintext font-weight-bolder">{{ promotion.description }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row my-2">
                                                        <label class="col-4 col-form-label">Loại:</label>
                                                        <div class="col-8">
                                                            <span class="form-control-plaintext font-weight-bolder">{{ (!promotion.type ? 'Theo phần trăm' : 'Theo giá') }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row my-2">
                                                        <label class="col-4 col-form-label">Mức giảm:</label>
                                                        <div class="col-8">
                                                            <span class="form-control-plaintext font-weight-bolder">{{ (promotion.type ? promotion.number + 'VNĐ' : promotion.number + '%') }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row my-2">
                                                        <label class="col-4 col-form-label">Ngày bắt đầu:</label>
                                                        <div class="col-8">
                                                            <span class="form-control-plaintext font-weight-bolder">{{ formatTime(promotion.start) }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row my-2">
                                                        <label class="col-4 col-form-label">Ngày kết thúc:</label>
                                                        <div class="col-8">
                                                            <span class="form-control-plaintext font-weight-bolder">{{ formatTime(promotion.end) }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="kt_tab_pane_2_8" role="tabpanel" aria-labelledby="kt_tab_pane_2_8">
                                    <div class="form-group row">
                                        <div class="col-12">
                                            <div class="table-responsive">
                                                <table class="table table-head-custom table-head-bg table-borderless table-vertical-center">
                                                    <thead>
                                                        <tr class="text-uppercase">
                                                            <th style="min-width: 200px">
                                                                <span class="text-dark-75">Sản phẩm</span>
                                                            </th>
                                                            <th style="min-width: 100px">Mô tả</th>
                                                            <th style="min-width: 100px">Khuyễn mãi</th>
                                                            <th style="min-width: 120px">Giá</th>
                                                            <th style="min-width: 120px">Ngày tạo</th>
                                                            <th class="text-center">
                                                                <button type="button" data-toggle="modal" data-target="#exampleModalLong1" class="btn btn-block btn-primary kt-btn btn-sm kt-btn--icon d-block">Thêm</button>
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr v-for="(item, key) in suggestion" :key="'row' + item.id">
                                                            <td class="pl-0 py-8">
                                                                <div class="d-flex align-items-center">
                                                                    <div class="symbol symbol-50 flex-shrink-0 mr-4">
                                                                        <div class="symbol-label" :style="`background-image: url('${item.url}')`"></div>
                                                                    </div>
                                                                    <div>
                                                                        <span class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg" v-text="Text(item.name, 50)"></span>
                                                                        <span class="text-muted d-block" v-text="Text(item.slug, 50)"></span>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <span class="text-dark-75 font-weight-bolder d-block font-size-lg" v-text="Text(item.description, 250)"></span>
                                                            </td>
                                                            <td>
                                                                <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{ item.promotion }}</span>
                                                            </td>
                                                            <td>
                                                                <span class="text-dark-75 font-weight-bolder d-block font-size-lg" v-text="formatPrice(item.price)"></span>
                                                            </td>
                                                            <td>
                                                                <span class="text-dark-75 font-weight-bolder d-block font-size-lg" v-text="formatTime(item.created_at)"></span>
                                                                <span class="text-muted font-weight-bold" v-text="formatHuors(item.created_at)"></span>
                                                            </td>
                                                            <td class="text-center">
                                                                <button @click="trashSuggestion(key)" type="button" class="btn btn-block btn-warning kt-btn btn-sm kt-btn--icon d-block">Xóa</button>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </ValidationObserver>
                    </form>
                </div>
                <div class="card-footer text-center">
                    <router-link to="/san-pham/danh-sach" type="reset" class="btn btn-light-primary mr-1 font-weight-bolder"><i class="icon-sm ki ki-long-arrow-back"></i> Quay Lại</router-link>
                    <button type="reset" @click="submit(1)" class="btn btn-primary mr-1"><i class="icon-sm ki ki-bold-check-1   "></i> Lưu Sản phẩm</button>
                    <button type="reset" @click="submit(0)" class="btn btn-primary mr-1"><i class="icon-sm ki ki-info"></i> Lưu Ẩn</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal-->
    <div class="modal fade" id="exampleModalLong1" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm sản phẩm gợi ý</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-body pt-0 pb-3">
                        <div class="row mb-5">
                            <div class="col-2">
                                <input v-model="filterName1" type="text" placeholder="Tên sản phẩm" class="form-control form-control-sm form-filter datatable-input"/>
                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-3">
                                        <select v-model="filterCategory" class="form-control form-control-sm form-filter datatable-input">
                                            <option value="">Danh mục</option>
                                            <template v-for="item in categories">
                                                <option :key="item.id" v-if="item.parent_id > 0" :value="item.id" v-text="item.name"></option>
                                            </template>
                                        </select>
                                    </div>
                                    <div class="col-3">
                                        <select v-model="filterPrice" class="form-control form-control-sm form-filter datatable-input">
                                            <option value="">Giá</option>
                                            <option value="DESC">Lớn dần</option>
                                            <option value="ASC">Giảm dần</option>
                                        </select>
                                    </div>
                                    <div class="col-3">
                                        <input v-model="filterPriceUp" type="number" class="form-control form-control-sm datatable-input" placeholder="Giá Từ" />
                                    </div>
                                    <div class="col-3">
                                        <input v-model="filterPriceDown" type="number" class="form-control form-control-sm datatable-input" placeholder="Đến"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="row">
                                    <div class="col-6">
                                        <select v-model="filterOrder" class="form-control form-control-sm form-filter datatable-input" title="Select" data-col-index="6">
                                            <option value="">Sắp xếp</option>
                                            <option value="DESC">Mới nhất</option>
                                            <option value="ASC">Cũ nhất</option>
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <select v-model="filterStatus" class="form-control form-control-sm form-filter datatable-input" title="Chọn" data-col-index="7">
                                            <option value="">Trạng thái</option>
                                            <option value="1">Hoạt Động</option>
                                            <option value="0">Tạm Ẩn</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-1">
                                <button @click="getApiProduct()" class="btn btn-block btn-primary kt-btn btn-sm kt-btn--icon d-block">Lọc SP</button>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-head-custom table-head-bg table-borderless table-vertical-center">
                                <thead>
                                    <tr class="text-uppercase">
                                        <th style="min-width: 200px">
                                            <span class="text-dark-75">Sản phẩm</span>
                                        </th>
                                        <th style="min-width: 100px">Mô tả</th>
                                        <th style="min-width: 100px">Khuyễn mãi</th>
                                        <th style="min-width: 120px">Giá</th>
                                        <th style="min-width: 120px">Ngày tạo</th>
                                        <th class="text-center">EXT</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="item in products.data" :key="'row' + item.id">
                                        <td class="pl-0 py-8">
                                            <div class="d-flex align-items-center">
                                                <div class="symbol symbol-50 flex-shrink-0 mr-4">
                                                    <div class="symbol-label" :style="`background-image: url('${item.url}')`"></div>
                                                </div>
                                                <div>
                                                    <span class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg" v-text="Text(item.name, 50)"></span>
                                                    <span class="text-muted d-block" v-text="Text(item.slug, 50)"></span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="text-dark-75 font-weight-bolder d-block font-size-lg" v-text="Text(item.description, 250)"></span>
                                        </td>
                                        <td>
                                            <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{ item.promotion }}</span>
                                        </td>
                                        <td>
                                            <span class="text-dark-75 font-weight-bolder d-block font-size-lg" v-text="formatPrice(item.price)"></span>
                                        </td>
                                        <td>
                                            <span class="text-dark-75 font-weight-bolder d-block font-size-lg" v-text="formatTime(item.created_at)"></span>
                                            <span class="text-muted font-weight-bold" v-text="formatHuors(item.created_at)"></span>
                                        </td>
                                        <td class="text-center">
                                            <button @click="addSuggestion(item)" data-dismiss="modal" aria-label="Close" class="btn btn-block btn-primary kt-btn btn-sm kt-btn--icon d-block">Thêm</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-body">
                        <paginate
                            :container-class="'phantrang'"
                            :prev-link-class="'btn btn-icon btn-sm border-0 btn-light mr-2 my-1'"
                            :next-link-class="'btn btn-icon btn-sm border-0 btn-light mr-2 my-1'"
                            :first-last-button="true"
                            :first-button-text="`<i class='ki ki-bold-double-arrow-back icon-xs'></i>`"
                            :last-button-text="`<i class='ki ki-bold-double-arrow-next icon-xs'></i>`"
                            :no-li-surround="true"
                            :page-count="(products == '' ? 0 : products.meta.last_page)"
                            :page-range="3"
                            :click-handler="toPage"
                            :disabled-class="'disable'"
                            :active-class="'btn-hover-primary active'"
                            :prev-text="`<i class='ki ki-bold-arrow-back icon-xs'></i>`"
                            :next-text="`<i class='ki ki-bold-arrow-next icon-xs'></i>`"
                            :page-link-class="'btn btn-icon btn-sm border-0 btn-light mr-2 my-1'"
                        >
                        </paginate>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal-->
    <div class="modal fade" id="exampleModalLong" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Chọn khuyễn mãi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card card-custom gutter-b example example-compact">
                        <div>
                            <ValidationObserver ref="errors">
                                <div class="card-body">
                                    <div class="row mb-5">
                                        <div class="col-11">
                                            <input v-model="filterName" type="text" placeholder="Tìm kiếm" class="form-control form-control-sm form-filter datatable-input"/>
                                        </div>
                                        <div class="col-1">
                                            <button @click="getApiKM()" type="button" class="btn btn-block btn-primary kt-btn btn-sm kt-btn--icon d-block">Lọc</button>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-head-custom table-head-bg table-borderless table-vertical-center">
                                            <thead>
                                                <tr class="text-uppercase">
                                                    <th style="min-width: 150px">
                                                        <span class="text-dark-75">Tên</span>
                                                    </th>
                                                    <th style="min-width: 60px">Loại</th>
                                                    <th style="min-width: 60px">Mức giảm</th>
                                                    <th style="min-width: 60px">Ngày bắt đầu</th>
                                                    <th style="min-width: 60px">Ngày kết thúc</th>
                                                    <th style="min-width: 60px">Trạng thái</th>
                                                    <th class="text-center">Chọn</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr v-for="item in promotions" :key="'row' + item.id">
                                                    <td>
                                                        <span class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg" v-text="item.title"></span>
                                                        <span class="text-muted d-block" v-text="item.description"></span>
                                                    </td>
                                                    <td>
                                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg" v-text="!item.type ? 'Theo phần trăm' : 'Theo giá'"></span>
                                                    </td>
                                                    <td>
                                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg" v-text="(item.type ? item.number + 'VNĐ' : item.number + '%')"></span>
                                                    </td>
                                                    <td>
                                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg" v-text="formatTime(item.start)"></span>
                                                        <span class="text-muted font-weight-bold" v-text="formatHuors(item.start)"></span>
                                                    </td>
                                                    <td>
                                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg" v-text="formatTime(item.end)"></span>
                                                        <span class="text-muted font-weight-bold" v-text="formatHuors(item.end)"></span>
                                                    </td>
                                                    <td>
                                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{ checkTime(item.end) ? 'Hết hạn' : 'Hoạt động' }}</span>
                                                    </td>
                                                    <td class="text-center">
                                                        <button type="button" @click="setPromotion(item.id)" class="btn btn-primary btn-sm" data-dismiss="modal" aria-label="Close">Chọn</button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </ValidationObserver>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div v-if="modal" class="modal fade" id="filemanager">
        <div class="modal-dialog modal-full min-vh-100">
            <div class="modal-content min-vh-100">
                <div class="modal-body">
                    <FileManage :getUrl="true" @url="setUrl($event)" />
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
import Extends from '../../extend';
import Breadcrumb from '../../components/breadcrumb/index'
import FileManage from '../../components/FileManager/index'
import Paginate from 'vuejs-paginate'
import moment from 'moment'
import {
    ValidationObserver,
    ValidationProvider,
    extend
} from 'vee-validate';
import {
    required
} from 'vee-validate/dist/rules';
extend('required', {
    ...required,
    message: 'Không được để trống'
});
extend('length', {
    validate(value, {
        min,
        max
    }) {
        return value.length >= min && value.length <= max;
    },
    params: ['min', 'max'],
    message: 'Độ dài không hợp lệ'
});
var typeimage = 'avatar';
export default {
    components: {
        Paginate,
        FileManage,
        Breadcrumb,
        ValidationProvider,
        ValidationObserver
    },
    data() {
        return {
            subHeader: {
                links: [{
                        name: 'Sản phẩm',
                        url: '/san-pham/danh-sach',
                    },
                    {
                        name: 'Thêm mới',
                        url: '/san-pham/them-moi',
                    },
                ],
                action: {
                    url: '/san-pham/danh-sach',
                    icon: 'icon-sm ki ki-long-arrow-back',
                    text: 'Danh Sách',
                }
            },
            notImage: false,
            attributes: [
                {
                    title: '',
                    options: [
                        {
                            key: '',
                            val: '',
                        }
                    ]
                }
            ],
            images: [],
            modal: false,
            name: '',
            file: '',
            number: '',
            slug: '',
            video: '',
            seo_title: '',
            seo_description: '',
            seo_keyword: '',
            price: '',
            description: '',
            categories: [],
            category: '',
            content: '',
            errorCategories: false,
            errorContent: false,
            products: [],
            promotions: [],
            filterName: '',
            promotion_id: '',
            promotion: '',
            filterName1: '',
            filterCategory: '',
            filterOrder: '',
            filterPrice: '',
            filterStatus: '',
            filterPriceUp: '',
            filterPriceDown: '',
            page: 1,
            suggestion: []
        }
    },
    watch: {
        name() {
            this.slug = Extends.ChangeToSlug(this.name)
        },
    },
    mounted() {
        this.getApiKM()
        axios('/api/categories?type=product').then(res => {
            this.categories = res.data.data
            KTUtil.ready(function () {
                var HelloButton = function (context) {
                    var ui = $.summernote.ui;
                    var button = ui.button({
                        contents: '<i class="fa far fa-folder"/>',
                        tooltip: 'Folder',
                        click: function () {
                            typeimage = 'summernote';
                            $('#filemanager').modal('show');
                        }
                    });
                    return button.render();
                }
                $('.summernote').summernote({
                    height: 350,
                    toolbar: [
                        ['style', ['style']],
                        ['font', ['bold', 'underline', 'clear']],
                        ['color', ['color']],
                        ['para', ['ul', 'ol', 'paragraph']],
                        ['table', ['table']],
                        ['insert', ['link', 'picture', 'video']],
                        ['mybutton', ['hello']],
                        ['view', ['fullscreen', 'codeview', 'help']]
                    ],
                    buttons: {
                        hello: HelloButton
                    },
                    callbacks: {
                        onImageUpload: function (files) {
                            let formdata = new FormData();
                            formdata.append("file", files[0]);
                            formdata.append("summernote", true);
                            axios.post('/api/images', formdata).then(res => {
                                var image = $('<img>').attr('src', res.data);
                                $('.summernote').summernote("insertNode", image[0]);
                            })
                        },
                    },
                });
            });
        })
    },
    methods: {
        addSuggestion(item) {
            this.suggestion.push(item); 
        },
        trashSuggestion (key) {
            this.suggestion.splice(key, 1); 
        },
        formatTime(time) {
            return moment(time).format('DD/MM/YYYY');
        },
        formatHuors(time) {
            return moment(time).format('hh:mm:ss');
        },
        Text(text, length) {
            return Extends.FormatText(text, length)
        },
        setPromotion(id) {
            let temp = this.promotions.find(item => item.id == id)
            if (!this.checkTime(temp.end)) {
                this.promotion_id = id
                this.promotion = temp
            }
            else {
                toastr.success("Khuyễn mãi hết hạn!")
            }
        },
        formatPrice(price) {
            return Extends.formartPrice(price)
        },
        getApiKM() {
            Extends.LoadPage()
            axios('/api/promotions?name=' + this.filterName).then(res => {
                KTApp.unblockPage();
                this.promotions = res.data.data
            })
        },
        async getApiProduct() {
            Extends.LoadPage()
            let query = {
                page: this.page,
                name: this.filterName1,
                category: this.filterCategory,
                order: this.filterOrder,
                price: this.filterPrice,
                status: this.filterStatus,
                PriceUp: this.filterPriceUp,
                PriceDown: this.filterPriceDown,
            }
            let products = await axios("/api/products", { params: query });
            this.products = products.data
            this.allID = [];
            products.data.data.forEach(item => {
                this.allID.push(item.id)
            });
            KTApp.unblockPage();
        },
        checkTime(param) {
            let date = moment(param).format('YYYY-MM-DD hh:mm:ss');
            let date1 = moment().format('YYYY-MM-DD hh:mm:ss')
            return moment(date).isBefore(date1);
        },
        formatTime(time) {
            return moment(time).format('DD/MM/YYYY');
        },
        formatHuors(time) {
            return moment(time).format('hh:mm:ss');
        },
        setTypeGetImg(status) {
            if (status === '')
                typeimage = 'avatar'
            else
                typeimage = status
        },
        setUrl(path) {
            $('#filemanager').modal('hide');
            this.notImage = false
            if (typeimage == 'summernote') {
                var image = $('<img>').attr('src', path);
                $('.summernote').summernote("insertNode", image[0]);
            } else if (typeimage == 'avatar') {
                this.images.push({
                    url: path
                })
            } else {
                this.images[typeimage].url = path
            }
        },
        async submit(status) {
            let listId = []; 
            this.suggestion.forEach(item => {
                listId.push(item.id)
            });
            if (await this.errors() && this.checkImage()) {
                let params = {
                    suggestion_id: listId,
                    promotion_id: this.promotion_id ? this.promotion_id : 0,
                    name: this.name,
                    slug: this.slug,
                    number: this.number,
                    price: this.price,
                    video: this.video,
                    seo_title: this.seo_title,
                    seo_description: this.seo_description,
                    seo_keyword: this.seo_keyword,
                    category_id: this.category,
                    avatar: this.images[0].url,
                    images: this.images,
                    attributes: this.attributes,    
                    description: this.description,
                    content: $('.summernote').summernote('code'),
                    status: String(status)
                }
                KTApp.blockPage({
                    overlayColor: "#000000",
                    state: "primary",
                    message: "Đợi Xíu...",
                })
                axios.post('/api/products', params).then((res) => {
                    KTApp.unblockPage();
                    toastr.success("Tạo Sản phẩm thành công!")
                    this.$router.push('/san-pham/danh-sach');
                })
            } else {
                toastr.success("From thông tin chung (bắt buộc)!")
            }
        },
        toPage(page = 1) {
            this.page = page
        },
        checkImage () {
            if (this.images == '') {
                return !(this.notImage = true)
            }
            else return true
        },
        async errors() {
            return await this.$refs['errors'].validate();
        },
    },
}
</script>
