import * as FilePond from 'filepond';
import FilePondPluginImagePreview from 'filepond-plugin-image-preview';
import 'filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css';



FilePond.registerPlugin(FilePondPluginImagePreview);

window.FilePond = FilePond;
