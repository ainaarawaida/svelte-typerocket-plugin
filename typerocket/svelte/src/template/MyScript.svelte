<script>
import {
    Router,
    Link,
    Route
} from "svelte-navigator";


import {
    loadScript
} from "./../lib/document";
import {
    onMount,
    onDestroy
} from "svelte";

let curLoc ;
$: if(window.location){
  curLoc = window.location?.pathname?.split("/");
}
// $: console.log("curLoc", curLoc)

onMount(async () => {

    // await loadScript(
    //   `${asseturl}/luq/js/luqman.js`,
    //   `luqman.js`
    // );
    await loadScript(
        `${asseturl}/luq/assets/js/jquery-3.5.1.min.js`,
        `jquery-3.5.1.min.js`
    );

    await loadScript(
        `${asseturl}/luq/assets/js/icons/feather-icon/feather.min.js`,
        `feather.min.js`
    );

    await loadScript(
        `${asseturl}/luq/assets/js/icons/feather-icon/feather-icon.js`,
        `feather-icon.js`
    );

    await loadScript(
        `${asseturl}/luq/assets/js/sidebar-menu3.js`,
        `sidebar-menu3.js`
    );

    await loadScript(
        `${asseturl}/luq/assets/js/config.js`,
        `config.js`
    );

    await loadScript(
        `${asseturl}/luq/assets/js/bootstrap/popper.min.js`,
        `popper.min.js`
    );

    await loadScript(
        `${asseturl}/luq/assets/js/bootstrap/bootstrap.min.js`,
        `bootstrap.min.js`
    );

    await loadScript(
        `${asseturl}/luq/assets/js/script.js`,
        `script.js`
    );

    // await loadScript(
    //   `${asseturl}/luq/assets/js/theme-customizer/customizer.js`,
    //   `customizer1.js`
    // );

    await loadScript(
        `${asseturl}/luq/assets/js/datatable/datatables/jquery.dataTables.min.js`,
        `jquery.dataTables.min.js`
    );
    await loadScript(
        `${asseturl}/luq/assets/js/datatable/datatable-extension/dataTables.buttons.min.js`,
        `dataTables.buttons.min.js`
    );
    await loadScript(
        `${asseturl}/luq/assets/js/datatable/datatable-extension/jszip.min.js`,
        `jszip.min.js`
    );
    await loadScript(
        `${asseturl}/luq/assets/js/datatable/datatable-extension/pdfmake.min.js`,
        `pdfmake.min.js`
    );
    await loadScript(
        `${asseturl}/luq/assets/js/datatable/datatable-extension/vfs_fonts.js`,
        `vfs_fonts.js`
    );
    await loadScript(
        `${asseturl}/luq/assets/js/datatable/datatable-extension/buttons.html5.min.js`,
        `buttons.html5.min.js`
    );
    await loadScript(
        `${asseturl}/luq/assets/js/datatable/datatable-extension/buttons.colVis.min.js`,
        `buttons.colVis.min.js`
    );

    await loadScript(
        `${asseturl}/luq/assets/js/sweet-alert/sweetalert.min.js`,
        `sweetalert.min.js`
    );

    await loadScript(
        `${asseturl}/luq/assets/js/select2/select2.full.min.js`,
        `select2.full.min.js`
    );

    await loadScript(
        `${asseturl}/luq/js/collect.min.js`,
        `collect.min.js`
    );
    await loadScript(
        `${asseturl}/luq/js/moment.min.js`,
        `moment.min.js`
    );

    await loadScript(
        `${asseturl}/luq/js/core.min.js`,
        `core.min.js`
    );

    await loadScript(
        `${asseturl}/luq/js/md5.js`,
        `md5.js`
    );


});

onDestroy(() => {
 
});
</script>
