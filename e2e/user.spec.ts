import { expect, test } from "@playwright/test";

import { login } from "./helpers/login";
import { v4 as uuidv4 } from "uuid";

const NORMALUSER = "test@example.org";
const NORMALPASSWORD = "password";

const ADMINUSER = "admin@example.org";
const ADMINPASSWORD = "password";


test("can Filter Rooms", async ({ page }) => {
    //  login
    await login(page, expect, NORMALUSER, NORMALPASSWORD);

    //  filter rooms, use query params
    await page.goto(
        "https://project.test/?min_price=0&max_price=50688&states%5B%5D=1"
    );

    const button = await page.waitForSelector(
        ".btn.btn-default.btn-squared.color-light.btn-outline-light.ms-lg-0.ms-0.me-2.mb-lg-10"
    );

    // Click the button
    await button.click();
});

test("can View Room", async ({ page }) => {
    //  login
    await login(page, expect, NORMALUSER, NORMALPASSWORD);

    //  view room
    await page.goto("https://project.test/rooms/1");

    //  expect to see room details
    page.waitForSelector("h6.modal-title");
    const title = await page.$eval("h6.modal-title", (el) => el.textContent);
    expect(title).toBe("Book this Room");
});