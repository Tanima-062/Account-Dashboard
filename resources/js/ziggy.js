const Ziggy = {"url":"http:\/\/127.0.0.1","port":null,"defaults":{},"routes":{"ignition.healthCheck":{"uri":"_ignition\/health-check","methods":["GET","HEAD"]},"ignition.executeSolution":{"uri":"_ignition\/execute-solution","methods":["POST"]},"ignition.updateConfig":{"uri":"_ignition\/update-config","methods":["POST"]},"accounts.index":{"uri":"\/","methods":["GET","HEAD"]},"accounts.create":{"uri":"create","methods":["GET","HEAD"]},"accounts.store":{"uri":"save","methods":["POST"]},"accounts.report":{"uri":"report","methods":["GET","HEAD"]}}};

if (typeof window !== 'undefined' && typeof window.Ziggy !== 'undefined') {
    Object.assign(Ziggy.routes, window.Ziggy.routes);
}

export { Ziggy };
