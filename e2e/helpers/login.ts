// testHelpers.js

import { Page } from "@playwright/test";
import { expect as _expect } from "@playwright/test";

export async function login(page: Page, expect: typeof _expect, username, password) {
    await page.goto("https://project.test");

    // expect redirect to /login
    await expect(page).toHaveURL("https://project.test/login");

    // Fill the login form.
    await page.fill('[name="email"]', username);

    // Fill the password field.
    await page.fill('[name="password"]', password);

    // Click the submit button.
    await page.click('button[type="submit"]');

    // expect redirect to /dashboard
    await expect(page).toHaveURL("https://project.test");
}

