"undefined" == typeof CookieControl && (CookieControl = {}), CookieControl.Cookie = function(n) {
    this.name = n, this.consented = !1, this.declined = !1, this.changed = !1, this.hasResponse = !1, this.consentID = "0", this.consent = {
        stamp: "0",
        necessary: !0,
        preferences: !1,
        statistics: !1,
        marketing: !1
    }, this.isOutsideEU = !1, this.host = "", this.iswhitelabel = !1, this.doNotTrack = !1, this.consentLevel = "strict", this.isRenewal = !1, this.forceShow = !1, this.dialog = null, this.responseMode = "", this.serial = "", this.scriptId = "Cookiebot", this.scriptElement = null, this.whitelist = [], this.pathlist = [], this.userIsInPath = !0, this.cookieEnabled = !0, this.versionChecked = !1, this.versionRequested = !1, this.version = 1, this.latestVersion = 1, this.CDN = "", this.retryCounter = 0, this.optOutLifetime = 12, this.init = function() {
        var that = this;
        if ("cookie" in document) {
            var testcookie = this.getCookie(this.name);
            testcookie || (this.cookieEnabled = -1 < (document.cookie = this.name + "=-3;expires=Thu, 01 Jan 2060 00:00:00 GMT").indexOf.call(document.cookie, this.name), this.cookieEnabled && (document.cookie = this.name + "=-3;expires=Thu, 01 Jan 1970 00:00:00 GMT"))
        } else this.cookieEnabled = !1;
        this.cookieEnabled || (this.isOutsideEU = !1, this.hasResponse = !0, this.declined = !0, this.consented = !1, this.consent.preferences = !1, this.consent.statistics = !1, this.consent.marketing = !1, this.consentID = "-3", this.consent.stamp = "-3");
        var d = document.getElementById(this.scriptId);
        if (!d || "script" != d.tagName.toLowerCase()) {
            this.iswhitelabel = !0, this.scriptId = "CookieConsent";
            var d = document.getElementById(this.scriptId);
            if (!d || "script" != d.tagName.toLowerCase()) {
                var tagsAll = document.getElementsByTagName("script");
                for (i = 0; i < tagsAll.length; i++) {
                    var currentTag = tagsAll[i];
                    if (that.hasAttr(currentTag, "src") && (that.hasAttr(currentTag, "data-cbid") || 0 < currentTag.getAttribute("src").toLowerCase().indexOf("cbid=")) && 0 < currentTag.getAttribute("src").toLowerCase().indexOf("/uc.js")) {
                        d = currentTag;
                        break
                    }
                }
                d && (that.hasAttr(d, "id") ? this.scriptId = d.getAttribute("id") : that.hasAttr(d, "src") && (d.getAttribute("src").toLowerCase().indexOf("consent.cookiebot.com") < 0 ? (this.scriptId = "CookieConsent", d.id = this.scriptId) : this.iswhitelabel = !1))
            }
        }
        if (d) {
            this.scriptElement = d, this.host = "https://" + d.src.match(/:\/\/(.[^/]+)/)[1] + "/";
            var e = d.getAttribute("data-cbid"),
                ex = this.getURLParam("cbid");
            ex && (e = ex), e && this.isGUID(e) && (this.serial = e);
            var p = d.getAttribute("data-path");
            if (p) {
                var custompathlist = p.replace("/ /g", "");
                this.pathlist = custompathlist.split(",")
            }
            var pol = d.getAttribute("data-optoutlifetime");
            pol && "0" == pol && (this.optOutLifetime = "0")
        }
        var px = this.getURLParam("path");
        if (px) {
            var custompathlist = px.replace("/ /g", "");
            this.pathlist = custompathlist.split(",")
        }
        var polx = this.getURLParam("optoutlifetime");
        polx && "0" == polx && (this.optOutLifetime = "0");
        var temppathlist = [];
        for (i = 0; i < this.pathlist.length; i++) {
            var currentpath = this.pathlist[i];
            "" != currentpath && (0 != currentpath.indexOf("/") && (currentpath = "/" + currentpath), temppathlist.push(decodeURIComponent(currentpath)))
        }
        if (this.pathlist = temppathlist, 0 < this.pathlist.length) {
            this.userIsInPath = !1;
            var userCurrentPath = window.location.pathname;
            if ("/" != userCurrentPath)
                for (i = 0; i < this.pathlist.length; i++)
                    if (0 === userCurrentPath.toLowerCase().indexOf(this.pathlist[i].toLowerCase())) {
                        this.currentPath = this.pathlist[i], this.userIsInPath = !0;
                        break
                    }
            this.userIsInPath || (this.consented = !0, this.declined = !1, this.hasResponse = !0, this.consent.preferences = !0, this.consent.statistics = !0, this.consent.marketing = !0, this.consentLevel = "implied")
        }
        if (this.iswhitelabel ? this.CDN = "https://consent.azureedge.net" : (this.CDN = "https://consentcdn.cookiebot.com", window.Cookiebot = this), this.userIsInPath) {
            var c = this.getCookie(this.name);
            if (c)
                if ("-2" == c ? (this.declined = !1, this.consented = !1, this.hasResponse = !1, this.consent.preferences = !1, this.consent.statistics = !1, this.consent.marketing = !1, this.consentLevel = "implied", this.versionChecked = !0) : ("0" == c ? (this.declined = !0, this.consent.preferences = !1, this.consent.statistics = !1, this.consent.marketing = !1, this.responseMode = "leveloptin", this.versionChecked = !0) : (this.consented = !0, this.consent.preferences = !0, this.consent.statistics = !0, this.consent.marketing = !0, "-1" == c && (this.isOutsideEU = !0, this.versionChecked = !0)), this.hasResponse = !0), 0 == c.indexOf("{") && 0 < c.indexOf("}")) {
                    var consentObject = eval("(" + c + ")");
                    this.consentID = consentObject.stamp, this.consent.stamp = consentObject.stamp, this.consent.preferences = consentObject.preferences, this.consent.statistics = consentObject.statistics, this.consent.marketing = consentObject.marketing, void 0 !== consentObject.ver && (this.version = consentObject.ver), "8FA6Uirnot8qJJs+tk3Lydy3jbJZtyn/iVpoPP38NTyR9dr1t5ebEw==" == this.consentID && (this.versionChecked = !0), this.responseMode = "leveloptin"
                } else this.consentID = c, this.consent.stamp = c;
            else if (this.isSpider()) return void this.setOutOfRegion()
        }
        this.setDNTState();
        var head = document.head || document.getElementsByTagName("head")[0];
        if (head) {
            var s = document.createElement("style");
            s.setAttribute("type", "text/css"), s.id = "CookieConsentStateDisplayStyles";
            var newstylesheet = "";
            if (this.consented) {
                var optins = [],
                    optouts = [];
                optins.push(".cookieconsent-optin"), this.consent.preferences ? (optins.push(".cookieconsent-optin-preferences"), optouts.push(".cookieconsent-optout-preferences")) : (optouts.push(".cookieconsent-optin-preferences"), optins.push(".cookieconsent-optout-preferences")), this.consent.statistics ? (optins.push(".cookieconsent-optin-statistics"), optouts.push(".cookieconsent-optout-statistics")) : (optouts.push(".cookieconsent-optin-statistics"), optins.push(".cookieconsent-optout-statistics")), this.consent.marketing ? (optins.push(".cookieconsent-optin-marketing"), optouts.push(".cookieconsent-optout-marketing")) : (optouts.push(".cookieconsent-optin-marketing"), optins.push(".cookieconsent-optout-marketing")), optouts.push(".cookieconsent-optout"), newstylesheet = optins.join() + "{display:block;}" + optouts.join() + "{display:none;}"
            } else newstylesheet = ".cookieconsent-optin-preferences,.cookieconsent-optin-statistics,.cookieconsent-optin-marketing,.cookieconsent-optin{display:none;}.cookieconsent-optout-preferences,.cookieconsent-optout-statistics,.cookieconsent-optout-marketing,.cookieconsent-optout{display:block;}";
            s.styleSheet ? s.styleSheet.cssText = newstylesheet : s.appendChild(document.createTextNode(newstylesheet)), head.appendChild(s)
        }
        if (this.consented || this.declined) this.setOnload();
        else {
            var submitImpliedConsent = function(e) {
                if ("object" == typeof CookieConsent && !CookieConsent.hasResponse && "object" == typeof CookieConsentDialog && "implied" == CookieConsentDialog.consentLevel) {
                    var t = e.target || e.srcElement;
                    if (t && (t.tagName && "a" == t.tagName.toLowerCase() || t.className.match(new RegExp("(\\s|^)cookieconsent-implied-trigger(\\s|$)")))) {
                        for (var o = !1, n = t; n;) {
                            if (n.id && n.id == CookieConsentDialog.DOMid) {
                                o = !0;
                                break
                            }
                            n = n.parentNode
                        }
                        var s = !1;
                        if ("a" == t.tagName.toLowerCase() && t.href && -1 < t.href.indexOf("javascript:") && (9 < t.href.indexOf("CookieConsent") || 9 < t.href.indexOf("Cookiebot")) && (s = !0), !o && !s) {
                            CookieConsent.submitConsent(!0, window.location.href, !1), document.removeEventListener ? document.removeEventListener("click", submitImpliedConsent, !0) : document.detachEvent && document.detachEvent("onclick", submitImpliedConsent);
                            var i = "object" == typeof google_tag_manager,
                                a = "object" == typeof _satellite,
                                c = "object" == typeof utag,
                                r = document.createEventObject && !document.createEvent && "function" != typeof MouseEvent;
                            if ((i || a || c) && !r) {
                                var l = e.target || e.srcElement;
                                setTimeout(function() {
                                    if ("function" == typeof MouseEvent) {
                                        var e = new MouseEvent("click", {
                                            view: window,
                                            bubbles: !0,
                                            cancelable: !0
                                        });
                                        l.dispatchEvent(e)
                                    } else if (document.createEvent) {
                                        (e = document.createEvent("MouseEvents")).initEvent("click", !0, !1), l.dispatchEvent(e)
                                    } else "function" == typeof l.onclick ? l.onclick() : "function" == typeof l.click && l.click()
                                }, 500), "bubbles" in e ? e.bubbles && e.stopPropagation() : e.cancelBubble = !0, e.preventDefault ? e.preventDefault() : window.event.returnValue = !1
                            }
                        }
                    }
                }
            };
            document.addEventListener ? document.addEventListener("click", submitImpliedConsent, !0) : document.attachEvent && document.attachEvent("onclick", submitImpliedConsent), this.process(!1);
            var cbonloadevent = function() {
                setTimeout(function() {
                    CookieConsent.applyDisplay(), "undefined" != typeof CookieDeclaration && "function" == typeof CookieDeclaration.SetUserStatusLabel && CookieDeclaration.SetUserStatusLabel(), "object" == typeof CookieConsentDialog && (CookieConsentDialog.pageHasLoaded = !0)
                }, 1e3)
            };
            document.body ? cbonloadevent() : window.addEventListener ? window.addEventListener("load", cbonloadevent, !1) : window.attachEvent("onload", cbonloadevent)
        }
    }, this.runScripts = function() {
        var e = this,
            t = [],
            o = [],
            n = document.getElementsByTagName("script");
        for (i = 0; i < n.length; i++) {
            var s = n[i];
            e.hasAttr(s, "data-cookieconsent") && e.hasAttr(s, "type") && "text/plain" == s.getAttribute("type").toLowerCase() && (e.hasAttr(s, "defer") ? (s.removeAttribute("defer"), o.push(s)) : t.push(s))
        }
        for (i = 0; i < o.length; i++) t.push(o[i]);
        for (i = 0; i < t.length; i++) {
            var a = (s = t[i]).getAttribute("data-cookieconsent").toLowerCase().split(","),
                c = !0;
            for (j = 0; j < a.length; j++) {
                var r = a[j].trim();
                "preferences" != r || CookieConsent.consent.preferences || (c = !1), "statistics" != r || CookieConsent.consent.statistics || (c = !1), "marketing" != r || CookieConsent.consent.marketing || (c = !1)
            }
            if (c) {
                for (var l = s.parentNode, h = s.nextElementSibling, p = document.createElement("script"), d = 0; d < s.attributes.length; d++) void 0 !== s.attributes[d].value && "" != s.attributes[d].value && p.setAttribute(s.attributes[d].name, s.attributes[d].value);
                p.text = s.text, p.setAttribute("type", "text/javascript"), l.removeChild(s), l.insertBefore(p, h || null)
            }
        }
        e.RunSrcTags("iframe"), e.RunSrcTags("img"), e.RunSrcTags("embed"), e.RunSrcTags("video"), e.RunSrcTags("audio")
    }, this.RunSrcTags = function(e) {
        var t = document.getElementsByTagName(e),
            o = [];
        for (i = 0; i < t.length; i++) {
            var n = t[i];
            this.hasAttr(n, "data-cookieconsent") && this.hasAttr(n, "data-src") && o.push(n)
        }
        for (i = 0; i < o.length; i++) {
            var s = (n = o[i]).getAttribute("data-cookieconsent").toLowerCase().split(","),
                a = !0;
            for (j = 0; j < s.length; j++) {
                var c = s[j].trim();
                "preferences" != c || CookieConsent.consent.preferences || (a = !1), "statistics" != c || CookieConsent.consent.statistics || (a = !1), "marketing" != c || CookieConsent.consent.marketing || (a = !1)
            }
            a ? (n.src = n.getAttribute("data-src"), n.style.display = "block") : n.style.display = "none"
        }
    }, this.applyDisplay = function() {
        var e;
        if (CookieConsent.consented) {
            e = CookieConsent.getConsentElementsByClassName("cookieconsent-optout-preferences");
            for (var t = 0; t < e.length; t++) e[t].style.display = "none";
            e = CookieConsent.getConsentElementsByClassName("cookieconsent-optout-statistics");
            for (t = 0; t < e.length; t++) e[t].style.display = "none";
            e = CookieConsent.getConsentElementsByClassName("cookieconsent-optout-marketing");
            for (t = 0; t < e.length; t++) e[t].style.display = "none";
            if (CookieConsent.consent.preferences) {
                e = CookieConsent.getConsentElementsByClassName("cookieconsent-optin-preferences");
                for (t = 0; t < e.length; t++) {
                    var o = "block";
                    this.hasClass(e[t], "cookieconsent-optin-statistics") && !CookieConsent.consent.statistics && (o = "none"), this.hasClass(e[t], "cookieconsent-optin-marketing") && !CookieConsent.consent.marketing && (o = "none"), e[t].style.display = o
                }
            } else {
                e = CookieConsent.getConsentElementsByClassName("cookieconsent-optout-preferences");
                for (t = 0; t < e.length; t++) e[t].style.display = "block"
            }
            if (CookieConsent.consent.statistics) {
                e = CookieConsent.getConsentElementsByClassName("cookieconsent-optin-statistics");
                for (t = 0; t < e.length; t++) {
                    o = "block";
                    this.hasClass(e[t], "cookieconsent-optin-preferences") && !CookieConsent.consent.preferences && (o = "none"), this.hasClass(e[t], "cookieconsent-optin-marketing") && !CookieConsent.consent.marketing && (o = "none"), e[t].style.display = o
                }
            } else {
                e = CookieConsent.getConsentElementsByClassName("cookieconsent-optout-statistics");
                for (t = 0; t < e.length; t++) e[t].style.display = "block"
            }
            if (CookieConsent.consent.marketing) {
                e = CookieConsent.getConsentElementsByClassName("cookieconsent-optin-marketing");
                for (t = 0; t < e.length; t++) {
                    o = "block";
                    this.hasClass(e[t], "cookieconsent-optin-preferences") && !CookieConsent.consent.preferences && (o = "none"), this.hasClass(e[t], "cookieconsent-optin-statistics") && !CookieConsent.consent.statistics && (o = "none"), e[t].style.display = o
                }
            } else {
                e = CookieConsent.getConsentElementsByClassName("cookieconsent-optout-marketing");
                for (t = 0; t < e.length; t++) e[t].style.display = "block"
            }
            e = CookieConsent.getConsentElementsByClassName("cookieconsent-optin");
            for (t = 0; t < e.length; t++) e[t].style.display = "block";
            e = CookieConsent.getConsentElementsByClassName("cookieconsent-optout");
            for (t = 0; t < e.length; t++) e[t].style.display = "none"
        } else {
            e = CookieConsent.getConsentElementsByClassName("cookieconsent-optin-preferences");
            for (t = 0; t < e.length; t++) e[t].style.display = "none";
            e = CookieConsent.getConsentElementsByClassName("cookieconsent-optin-statistics");
            for (t = 0; t < e.length; t++) e[t].style.display = "none";
            e = CookieConsent.getConsentElementsByClassName("cookieconsent-optin-marketing");
            for (t = 0; t < e.length; t++) e[t].style.display = "none";
            e = CookieConsent.getConsentElementsByClassName("cookieconsent-optin");
            for (t = 0; t < e.length; t++) e[t].style.display = "none";
            e = CookieConsent.getConsentElementsByClassName("cookieconsent-optout-preferences");
            for (t = 0; t < e.length; t++) e[t].style.display = "block";
            e = CookieConsent.getConsentElementsByClassName("cookieconsent-optout-statistics");
            for (t = 0; t < e.length; t++) e[t].style.display = "block";
            e = CookieConsent.getConsentElementsByClassName("cookieconsent-optout-marketing");
            for (t = 0; t < e.length; t++) e[t].style.display = "block";
            e = CookieConsent.getConsentElementsByClassName("cookieconsent-optout");
            for (t = 0; t < e.length; t++) e[t].style.display = "block"
        }
        var n = document.getElementsByTagName("iframe");
        for (t = 0; t < n.length; t++) {
            var s = n[t];
            this.hasAttr(s, "data-cookieconsent") && this.hasAttr(s, "data-src") && !this.hasAttr(s, "src") && (s.style.display = "none")
        }
    }, this.hasClass = function(e, t) {
        return e.className.match(new RegExp("(\\s|^)" + t + "(\\s|$)"))
    }, this.getConsentElementsByClassName = function(e) {
        return document.getElementsByClassName ? document.getElementsByClassName(e) : document.querySelectorAll ? document.querySelectorAll("." + e) : []
    }, this.setOnload = function() {
        var e = this;
        this.isOutsideEU ? (this.versionRequested = !0, this.versionChecked = !0) : setTimeout(function() {
            e.versionChecked || e.versionRequested || (e.versionRequested = !0, e.getScript(e.CDN + "/consentconfig/" + e.serial + "/state.js", !0, function() {
                e.versionChecked = !0
            }))
        }, 1), document.body ? "string" == typeof document.readyState ? "complete" === document.readyState ? setTimeout(function() {
            e.triggerOnloadEvents()
        }, 1) : setTimeout(function() {
            e.setOnload()
        }, 100) : setTimeout(function() {
            e.triggerOnloadEvents()
        }, 1) : window.addEventListener ? window.addEventListener("load", e.triggerOnloadEvents, !1) : window.attachEvent("onload", e.triggerOnloadEvents)
    }, this.triggerOnloadEvents = function() {
        var e = this;
        if (!this.versionChecked && this.retryCounter < 10) this.retryCounter += 1, setTimeout(function() {
            e.triggerOnloadEvents()
        }, 100);
        else {
            if (this.retryCounter = 0, this.version < this.latestVersion) return this.removeCookies(), this.consent.preferences = !1, this.consent.statistics = !1, this.consent.marketing = !1, this.hasResponse = !1, this.consented = !1, this.declined = !1, this.changed = !0, "undefined" != typeof CookieDeclaration && "function" == typeof CookieDeclaration.SetUserStatusLabel && CookieDeclaration.SetUserStatusLabel(), CookieConsent.applyDisplay(), void this.show(!1);
            CookieConsent.applyDisplay(), "undefined" != typeof CookieDeclaration && "function" == typeof CookieDeclaration.SetUserStatusLabel && CookieDeclaration.SetUserStatusLabel(), CookieConsent.onload && CookieConsent.onload(), "function" == typeof CookiebotCallback_OnLoad ? CookiebotCallback_OnLoad() : "function" == typeof CookieConsentCallback_OnLoad && CookieConsentCallback_OnLoad(), CookieConsent.consented ? (CookieConsent.onaccept && CookieConsent.onaccept(), "function" == typeof CookiebotCallback_OnAccept ? CookiebotCallback_OnAccept() : "function" == typeof CookieConsentCallback_OnAccept && CookieConsentCallback_OnAccept(), CookieConsent.runScripts()) : (CookieConsent.ondecline && CookieConsent.ondecline(), "function" == typeof CookiebotCallback_OnDecline ? CookiebotCallback_OnDecline() : "function" == typeof CookieConsentCallback_OnDecline && CookieConsentCallback_OnDecline())
        }
    }, this.show = function(e) {
        var t = !1;
        e ? (t = e, this.cookieEnabled || alert("Please enable cookies in your browser to proceed.")) : this.forceShow = !0, this.cookieEnabled && (this.hasResponse = !1, this.process(t))
    }, this.hide = function() {
        "object" == typeof CookieConsentDialog && CookieConsentDialog.hide()
    }, this.renew = function() {
        this.isRenewal = !0, this.show(!0), setTimeout(function() {
            "object" == typeof CookieConsentDialog && "inlineoptin" == CookieConsentDialog.responseMode && CookieConsentDialog.toggleDetails()
        }, 300)
    }, this.getURLParam = function(e) {
        var t = document.getElementById(this.scriptId);
        if (t || (t = this.scriptElement), t && (e = new RegExp("[?&]" + encodeURIComponent(e) + "=([^&#]*)").exec(t.src))) return decodeURIComponent(e[1].replace(/\+/g, " "))
    }, this.process = function(e) {
        var t = document.getElementById(this.scriptId);
        if (t || (t = this.scriptElement), t) {
            var o = t.getAttribute("data-cbid"),
                n = this.getURLParam("cbid");
            if (n && (o = n), o)
                if (this.isGUID(o)) {
                    this.serial = o;
                    var s = "?renew=" + e;
                    s = s + "&referer=" + encodeURIComponent(window.location.protocol + "//" + window.location.hostname), e && (s = s + "&nocache=" + (new Date).getTime());
                    var i = t.getAttribute("data-mode"),
                        a = this.getURLParam("mode");
                    a && (i = a), i && (s = s + "&mode=" + i);
                    var c = t.getAttribute("data-culture"),
                        r = this.getURLParam("culture");
                    r && (c = r), c && (s = s + "&culture=" + c);
                    var l = t.getAttribute("data-type"),
                        h = this.getURLParam("type");
                    h && (l = h), l && (s = s + "&type=" + l);
                    var p = t.getAttribute("data-level"),
                        d = this.getURLParam("level");
                    d && (p = d), p && (s = s + "&level=" + p);
                    var u = t.getAttribute("data-path"),
                        C = this.getURLParam("path");
                    C && (u = C), u && (s = s + "&path=" + encodeURIComponent(u));
                    var k = "false";
                    this.doNotTrack && (k = "true"), s = (s = (s = s + "&dnt=" + k) + "&forceshow=" + this.forceShow) + "&cbid=" + o;
                    u = "false";
                    this.iswhitelabel && (u = "true"), s = (s = s + "&whitelabel=" + u) + "&brandid=" + this.scriptId, this.cookieEnabled ? (this.changed = !0, this.getScript(this.host + o + "/cc.js" + s)) : (this.consented = !1, this.declined = !0, this.hasResponse = !0, this.consent.preferences = !1, this.consent.statistics = !1, this.consent.marketing = !1, this.consentID = "-3", this.consent.stamp = "-3")
                } else this.log("Error: Cookie script tag ID " + o + " is not a valid key.");
            else this.log("Error: Cookie script tag attribute 'data-cbid' is missing.")
        } else this.log("Error: Can't read data values from the cookie script tag - make sure to set script attribute ID.")
    }, this.log = function(e) {
        console && ("function" == typeof console.warn ? console.warn(e) : console.log && console.log(e))
    }, this.getCookie = function(e) {
        var t, o, n, s = "",
            i = document.cookie,
            a = i.split(";");
        for (t = 0; t < a.length; t++)
            if (o = a[t].substr(0, a[t].indexOf("=")), n = a[t].substr(a[t].indexOf("=") + 1), (o = o.replace(/^\s+|\s+$/g, "")) == e) {
                if (!(e == this.name && 1 < i.split(e).length - 1)) return unescape(n);
                (n.length > s.length || "0" == n) && (s = n)
            }
        if ("" != s) return unescape(s)
    }, this.setCookie = function(e, t, o, n, s) {
        var i = "https:" == window.location.protocol;
        s && (i = s);
        var a = this.name + "=" + e + (t ? ";expires=" + t.toGMTString() : "") + (o ? ";path=" + o : "") + (n ? ";domain=" + n : "") + (i ? ";secure" : "");
        document.cookie = a
    }, this.removeCookies = function() {
        for (var e = document.cookie.split(";"), t = window.location.pathname.split("/"), o = 0; o < e.length; o++) {
            for (var n = e[o], s = n.indexOf("="), i = -1 < s ? n.substr(0, s) : n, a = !1, c = 0; c < this.whitelist.length; c++)
                if (this.whitelist[c] === i) {
                    a = !0;
                    break
                }
            if (!a && i != this.name) {
                var r = ";path=",
                    l = "=;expires=Thu, 01 Jan 1970 00:00:00 GMT",
                    h = ";domain=";
                document.cookie = i + l;
                for (c = 0; c < t.length; c++) r += ("/" != r.substr(-1) ? "/" : "") + t[c], document.cookie = i + l + r, document.cookie = i + l + r + h + escape(window.location.hostname), document.cookie = i + l + r + h + "." + escape(window.location.hostname), document.cookie = i + l + r + h + escape(p(window.location.hostname)), document.cookie = i + l + r + h + "." + escape(p(window.location.hostname))
            }(function() {
                var e = "cookiebottest";
                try {
                    return localStorage.setItem(e, e), localStorage.removeItem(e), !0
                } catch (e) {
                    return !1
                }
            })() && (localStorage.clear(), "undefined" != typeof sessionStorage && sessionStorage.clear())
        }

        function p(e) {
            var t = e;
            if (0 < e.length) {
                var o = t.split(".");
                1 < t.length && (t = o.slice(-2).join("."))
            }
            return t
        }
    }, this.withdraw = function() {
        this.consented = !1, this.declined = !1, this.hasResponse = !1, this.consent.preferences = !1, this.consent.statistics = !1, this.consent.marketing = !1, this.removeCookies(), this.changed = !0, "0" == this.optOutLifetime ? this.setCookie("0", null, "/") : this.setCookie("0", (new CookieControl.DateTime).addMonths(12), "/"), "undefined" != typeof CookieDeclaration && "function" == typeof CookieDeclaration.SetUserStatusLabel && CookieDeclaration.SetUserStatusLabel(), CookieConsent.ondecline(), "function" == typeof CookiebotCallback_OnDecline ? CookiebotCallback_OnDecline() : "function" == typeof CookieConsentCallback_OnDecline && CookieConsentCallback_OnDecline(), CookieConsent.applyDisplay()
    }, this.setOutOfRegion = function() {
        this.isOutsideEU = !0, this.hasResponse = !0, this.declined = !1, this.consented = !0, this.consent.preferences = !0, this.consent.statistics = !0, this.consent.marketing = !0, this.setCookie("-1", (new CookieControl.DateTime).addMonths(1), "/"), this.changed = !0, this.version = this.latestVersion, this.setOnload()
    }, this.isSpider = function() {
        return /adidxbotc|Applebot\/|archive.org_bot|asterias\/|Baiduspider\/|bingbot\/|BingPreview\/|DuckDuckBot\/|FAST-WebCrawler\/|Feedspot|Feedspotbot\/|Google Page Speed Insights|Google PP|Google Search Console|Google Web Preview|Googlebot\/|Googlebot-Image\/|Googlebot-Mobile\/|Googlebot-News|Googlebot-Video\/|Google-SearchByImage|Google-Structured-Data-Testing-Tool|heritrix\/|iaskspider\/|Mediapartners-Google|msnbot\/|msnbot-media\/|msnbot-NewsBlogs\/|msnbot-UDiscovery\/|special_archiver\/|Y!J-ASR\/|Y!J-BRI\/|Y!J-BRJ\/YATS|Y!J-BRO\/YFSJ|Y!J-BRW\/|Y!J-BSC\/|Yahoo! Site Explorer Feed Validator|Yahoo! Slurp|YahooCacheSystem|Yahoo-MMCrawler\/|YahooSeeker\//.test(navigator.userAgent)
    }, this.getScript = function(e, t, o) {
        var n = document.getElementsByTagName("script")[0],
            s = document.createElement("script");
        s.type = "text/javascript";
        var i = !(s.charset = "UTF-8"),
            a = !0;
        if (void 0 === t || t || (a = !1), a && !("async" in s) && "undefined" != typeof XMLHttpRequest) try {
            i = !0;
            var c = new XMLHttpRequest;
            c.onreadystatechange = function() {
                4 == c.readyState && (200 != c.status && 304 != c.status || (s.text = c.responseText, n.parentNode.insertBefore(s, n), o && o()))
            }, c.open("GET", e, !0), c.send()
        } catch (e) {
            i = !1
        }
        i || (a && (s.async = "async"), s.src = e, s.onload = s.onreadystatechange = function(e, t) {
            (t || !s.readyState || /loaded|complete/.test(s.readyState)) && (s.onload = s.onreadystatechange = null, t || o && o())
        }, n.parentNode.insertBefore(s, n))
    }, this.loadIframe = function(e, t) {
        var o = document.getElementById(e);
        o && (o.src = t)
    }, this.setDNTState = function() {
        "yes" === navigator.doNotTrack || "1" === navigator.msDoNotTrack || "1" === navigator.doNotTrack || !1 === this.cookieEnabled || !1 === navigator.cookieEnabled ? this.doNotTrack = !0 : this.doNotTrack = !1
    }, this.submitConsent = function(e, t, o) {
        "object" == typeof CookieConsentDialog && (this.changed = !0, CookieConsentDialog.submitConsent(e, t, o))
    }, this.isGUID = function(e) {
        return !!(0 < e.length && /^(\{){0,1}[0-9a-fA-F]{8}\-[0-9a-fA-F]{4}\-[0-9a-fA-F]{4}\-[0-9a-fA-F]{4}\-[0-9a-fA-F]{12}(\}){0,1}$/.test(e))
    }, this.hasAttr = function(e, t) {
        return e.hasAttribute ? e.hasAttribute(t) : !!e.getAttribute(t)
    }, this.init()
}, String.prototype.trim = function() {
    return this.replace(/^\s*/, "").replace(/\s*$/, "")
}, CookieControl.Cookie.prototype.onload = function() {}, CookieControl.Cookie.prototype.ondecline = function() {}, CookieControl.Cookie.prototype.onaccept = function() {}, CookieControl.DateTime = function(e) {
    this.Date = new Date, e && (this.Date = e), this.isLeapYear = function(e) {
        return e % 4 == 0 && e % 100 != 0 || e % 400 == 0
    }, this.getDaysInMonth = function(e, t) {
        return [31, this.isLeapYear(e) ? 29 : 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31][t]
    }, this.addMonths = function(e) {
        var t = this.Date.getDate();
        return this.Date.setDate(1), this.Date.setMonth(this.Date.getMonth() + e), this.Date.setDate(Math.min(t, this.getDaysInMonth(this.Date.getFullYear(), this.Date.getMonth()))), this.Date
    }
};
var CookieConsent = new CookieControl.Cookie("CookieConsent");
"CookieConsent" != CookieConsent.scriptId && "Cookiebot" != CookieConsent.scriptId && (window[CookieConsent.scriptId] = CookieConsent);