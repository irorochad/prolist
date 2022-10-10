<?php
// HEader Meta tags
$page_title = "Reset your password";
$page_description = "Prolist helps you find and discover crypto projects with accurate informations";
?>

<?php include "./includes/header.inc.php";
include "function.php"; ?>

<main class="min-h-screen flex flex-col items-center justify-center bg-gray-50 dark:bg-slate-900 space-y-10 py-12 px-4 sm:px-6 lg:px-8">
    <div>
        <h1 class="mt-6 text-center text-3xl font-extrabold text-gray-900 dark:text-gray-100">Reset account password</h1>
        <p class="mt-2 text-center text-sm text-gray-600">
            Or
            <a href="login" class="font-medium text-indigo-600 border-b border-indigo-600"> Login! </a>
        </p>
    </div>
    <form action="" method="post" class="w-full">
        <div class="max-w-md w-full mx-auto bg-white dark:bg-[#77325f2d] rounded-lg shadow-xl p-7 space-y-6">
            <div class="flex flex-col">
                <label class="text-sm font-bold text-gray-600 dark:text-gray-300 mb-1" for="password">Password *</label>
                <input class="border rounded-md bg-white dark:bg-slate-300 px-3 py-2" type="password" name="passwordID" id="password" placeholder="Enter your Password" />
                <p class="text-red-700"><?php echo isset($errorMsg['password']) ? $errorMsg['password'] : '' ?></p>
            </div>
            <div class="flex flex-col">
                <label class="text-sm font-bold text-gray-600 dark:text-gray-300 mb-1" for="passwordconfirm">Confirm Password *</label>
                <input class="border rounded-md bg-white dark:bg-slate-300 px-3 py-2" type="password" name="passwordConfirm" id="passwordconfirm" placeholder="Confirm your Password" />
                <p class="text-red-700"><?php echo isset($errorMsg['passwordConfirm']) ? $errorMsg['passwordConfirm'] : '' ?></p>
            </div>
            <div>
                <button name="loginBtn" class="w-full bg-indigo-600 text-white rounded-md p-2">Reset Password</button>
            </div>

        </div>
    </form>
</main>

<?php include "./includes/footer.inc.php"; ?>