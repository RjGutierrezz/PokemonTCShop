#!/bin/bash
set -e -v

echo "Creating and filling tables for Pokemon Database..."
./hw3_soln.sh

echo "Running..."
python3 ./python_db.py
