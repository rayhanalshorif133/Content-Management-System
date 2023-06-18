const { categoryApp } = require("./_partials/category");
const { handleLightBox } = require("./_partials/common");
const { contentOwnerApp } = require("./_partials/contentOwner");
const { contentTypeApp } = require("./_partials/contentType");
const { contentApp } = require("./_partials/contentApp");

handleLightBox();
categoryApp();
contentOwnerApp();
contentTypeApp();
contentApp();