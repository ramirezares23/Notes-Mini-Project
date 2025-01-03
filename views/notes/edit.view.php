<?php require base_path('views/partials/head.php') ?>

<?php require base_path('views/partials/nav.php') ?>

<?php require base_path('views/partials/banner.php') ?>

<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <form method="POST" action="/note">
            <input type="hidden" name="_method" value="PATCH">
            <input type="hidden" name="id" value="<?= $note['id']?>">

            <div class="space-y-12">
                <div class="border-b border-gray-900/10 pb-12">
                    <div class="mt-2 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="col-span-full">
                            <label for="body" class="block text-sm/6 font-medium text-gray-900">Descripcion de su
                                nota</label>
                            <div class="mt-2">
                                <textarea name="body" id="body" rows="3" placeholder="Escribe aqui tu nota"
                                    class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 
                                    -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 
                                    focus:outline-indigo-600 sm:text-sm/6"><?= $_POST['body'] ?? '' ?><?= $note['body'] ?></textarea>
                                <?php if (isset($errors['body'])): ?>
                                    <p class="text-red-500 text-xs mt-2"><?= $errors['body'] ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-2 flex items-center justify-end gap-x-4">
                <a href="/notes"
                    class="rounded-md bg-gray-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Cancelar
                </a>
                <button type="submit"
                    class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Actualizar
                </button>
            </div>
        </form>

    </div>
</main>

<?php require base_path('views/partials/footer.php') ?>