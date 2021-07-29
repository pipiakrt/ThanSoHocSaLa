<template>
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <Breadcrumb :data="subHeader" />
    <div class="d-flex flex-column-fluid">
        <div class="container-fluid">
            <div class="d-flex flex-row">
                <FileManage />
            </div>
        </div>
    </div>
</div>
</template>
<script>
import Breadcrumb from '../../components/breadcrumb/index'
import FileManage from '../../components/FileManager/index'
export default {
    components: {
        Breadcrumb,
        FileManage
    },
    data() {
        return {
            subHeader: {
                links: [
                    {
                        name: 'Tệp tin',
                        url: '/tep-tin',
                    },
                ],
                action: {
                    url: '/',
                    icon: 'icon-sm ki ki-long-arrow-back',
                    text: 'Dashboard',
                }
            },
        }
    },
}
</script>
<style>
    .modal-dialog.modal-full {
        max-width: 100% !important;
        margin: 0 !important;
        background: #eef0f8;
    }
    .modal-dialog.modal-full .modal-content {
        background-color: unset !important;
    }
    #filemanager::-webkit-scrollbar { 
        display: none; 
    }
    #filemanager { 
        padding-right: 0px !important;
    }
</style>