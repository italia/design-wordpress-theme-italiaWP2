#!/usr/bin/env node
/**
 * Verifica che la versione di bootstrap-italia sia la stessa in tutti i punti
 * in cui è dichiarata: package.json, gli asset vendorizzati in static/ e la
 * costante ITALIAWP2_BOOTSTRAP_ITALIA_VERSION usata come cache buster.
 *
 * Eseguito automaticamente da `npm run vendor:bi`.
 */
const fs = require('fs');
const path = require('path');

const root = path.join(__dirname, '..');
const read = (p) => fs.readFileSync(path.join(root, p), 'utf8');

const extract = (file, re) => {
  const m = read(file).match(re);
  if (!m) throw new Error(`versione non trovata in ${file}`);
  return m[1];
};

const found = {
  'package.json': JSON.parse(read('package.json')).dependencies['bootstrap-italia'],
  'static/css/bootstrap-italia.min.css': extract(
    'static/css/bootstrap-italia.min.css',
    /bootstrap-italia-version:"([^"]+)"/
  ),
  'static/js/bootstrap-italia.min.js': extract(
    'static/js/bootstrap-italia.min.js',
    /BOOTSTRAP_ITALIA_VERSION="([^"]+)"/
  ),
  'inc/enqueue.php': extract(
    'inc/enqueue.php',
    /ITALIAWP2_BOOTSTRAP_ITALIA_VERSION',\s*'([^']+)'/
  ),
};

for (const [where, version] of Object.entries(found)) {
  console.log(`  ${version.padEnd(10)} ${where}`);
}

const distinct = new Set(Object.values(found));
if (distinct.size !== 1) {
  console.error(
    '\nDISALLINEAMENTO: allinea la costante ITALIAWP2_BOOTSTRAP_ITALIA_VERSION ' +
      'in inc/enqueue.php e la dipendenza in package.json.'
  );
  process.exit(1);
}

console.log(`\nOK: bootstrap-italia ${distinct.values().next().value} allineato ovunque.`);
