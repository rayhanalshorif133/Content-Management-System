const { categoryApp } = require("./_partials/category");
const { handleLightBox } = require("./_partials/common");
const { contentOwnerApp } = require("./_partials/contentOwner");
const { contentTypeApp } = require("./_partials/contentType");

handleLightBox();
categoryApp();
contentOwnerApp();
contentTypeApp();