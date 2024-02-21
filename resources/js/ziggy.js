const Ziggy = {"url":"http:\/\/127.0.0.1:8000","port":8000,"defaults":{},"routes":{"sanctum.csrf-cookie":{"uri":"sanctum\/csrf-cookie","methods":["GET","HEAD"]},"ignition.healthCheck":{"uri":"_ignition\/health-check","methods":["GET","HEAD"]},"ignition.executeSolution":{"uri":"_ignition\/execute-solution","methods":["POST"]},"ignition.updateConfig":{"uri":"_ignition\/update-config","methods":["POST"]},"api.admin.products":{"uri":"api\/admin\/products","methods":["GET","HEAD"]},"api.admin.product.save":{"uri":"api\/admin\/product\/save\/{product}","methods":["POST"],"parameters":["product"],"bindings":{"product":"id"}},"api.admin.product.delete":{"uri":"api\/admin\/product\/delete\/{product}","methods":["GET","HEAD"],"parameters":["product"],"bindings":{"product":"id"}},"\/":{"uri":"\/","methods":["GET","HEAD"]},"login":{"uri":"login","methods":["GET","HEAD"]},"auth":{"uri":"login","methods":["POST"]},"signup.form":{"uri":"sign_up","methods":["GET","HEAD"]},"signup":{"uri":"sign_up","methods":["POST"]},"signup.verify":{"uri":"signup\/verify","methods":["POST"]},"forgot.form":{"uri":"forgot","methods":["GET","HEAD"]},"forgot":{"uri":"forgot","methods":["POST"]},"forgot.verify":{"uri":"forgot\/verify","methods":["POST"]},"logout":{"uri":"logout","methods":["GET","HEAD"]},"admin":{"uri":"admin","methods":["GET","HEAD"]},"admin.products":{"uri":"admin\/products","methods":["GET","HEAD"]},"admin.products.form":{"uri":"admin\/products\/form","methods":["GET","HEAD"]},"admin.product":{"uri":"admin\/products\/{product}","methods":["GET","HEAD"],"parameters":["product"],"bindings":{"product":"id"}}}};

if (typeof window !== 'undefined' && typeof window.Ziggy !== 'undefined') {
    Object.assign(Ziggy.routes, window.Ziggy.routes);
}

export { Ziggy };