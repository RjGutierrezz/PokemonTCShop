#!/bin/bash
set -e -v

echo "Creating and filling tables for Pokemon Database..."
./generate_db.sh

echo "Running..."
python3 ./python_db.py
